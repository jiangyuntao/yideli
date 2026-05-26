<?php

namespace App\Http\Controllers\Index;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends BaseController
{
    public function index(Request $request, $lang = 'en', $slug = null)
    {
        // 1. 获取侧边栏的分类树
        $categories = Category::whereNull('parent_id')
            ->where('is_visible', true)
            ->with(['children' => function ($q) {
                $q->where('is_visible', true)->orderBy('sort_order');
            }])
            ->orderBy('sort_order')
            ->get();

        // 2. 初始化产品查询 (全局显示开关)
        $query = Product::query()
            ->where('is_visible', true)
            ->withCount('accessCodes');

        // 3. 处理分类筛选逻辑 (关键点：有 slug 才查分类，没 slug 就跳过)
        $currentCategory = null;

        if ($slug) {
            $locale = App::getLocale();
            // 查找分类
            $currentCategory = Category::where("slug->{$locale}", $slug)
                ->orWhere('slug->en', $slug)
                ->firstOrFail(); // 如果 slug 乱写，直接 404

            // 获取该分类及其子分类的所有 ID
            $categoryIds = $currentCategory->children()->pluck('id')->push($currentCategory->id);

            // 筛选这些分类下的产品
            $query->whereIn('category_id', $categoryIds);
        }

        // 4. 处理材质筛选
        $locale = App::getLocale();
        if ($request->has('material')) {
            $selectedMaterials = (array) $request->input('material');
            $query->where(function ($q) use ($selectedMaterials, $locale) {
                foreach ($selectedMaterials as $mat) {
                    // JSON 查询：匹配当前语言的材质字段
                    $q->orWhere("material->{$locale}", $mat);
                }
            });
        }

        // 5. 获取所有可选材质 (侧边栏用)
        // 建议缓存，这里为了演示直接查
        $availableMaterials = Product::whereNotNull('material')
            ->get()
            ->map(fn($p) => $p->getTranslation('material', $locale))
            ->filter()
            ->unique()
            ->values();

        // 6. 分页查询
        $products = $query->latest()->paginate(12)->withQueryString();

        $this->data['categories'] = $categories;
        $this->data['products'] = $products;
        $this->data['currentCategory'] = $currentCategory;
        $this->data['availableMaterials'] = $availableMaterials;

        return view('index.product.index', $this->data);
    }

    public function show(Request $request, $lang, $slug)
    {
        $locale = App::getLocale();
        $routeKey = (string) $slug;

        // 1. 查找产品 (包含关联分类和关联商品)
        $product = Product::query()
            ->where(function ($query) use ($locale, $routeKey) {
                $query->where("slug->{$locale}", $routeKey)
                    ->orWhere('slug->en', $routeKey);

                if (ctype_digit($routeKey)) {
                    $query->orWhere($query->getModel()->getQualifiedKeyName(), (int) $routeKey);
                }
            })
            ->where('is_visible', true)
            ->withCount('accessCodes')
            ->with([
                'category',
                'relatedProducts' => fn($query) => $query->with('category')->withCount('accessCodes'),
            ])
            ->firstOrFail();

        // 2. 权限判断逻辑
        // 检查该产品是否被任何 Access Code 锁定
        $isPrivate = $product->access_codes_count > 0;

        // 获取当前用户 Session 中已解锁的 ID
        $unlockedIds = session('unlocked_product_ids', []);

        // 最终判断：如果不是私有的，或者 ID 在解锁列表中，则为 true
        $hasAccess = !$isPrivate || in_array($product->id, $unlockedIds);

        // 3. 传递数据
        $this->data['product'] = $product;
        $this->data['hasAccess'] = $hasAccess;
        $this->data['relatedProducts'] = $product->relatedProducts; // 获取关联商品

        return view('index.product.show', $this->data);
    }
}
