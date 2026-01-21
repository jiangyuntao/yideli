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
        $query = Product::query()->where('is_visible', true);

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

    public function show(Request $request)
    {
        return view('index.product.show', $this->data);
    }
}
