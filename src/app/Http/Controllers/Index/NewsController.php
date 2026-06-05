<?php

namespace App\Http\Controllers\Index;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NewsController extends BaseController
{
    /**
     * 新闻列表页
     */
    public function index(Request $request, $lang = 'en', $slug = null)
    {
        $locale = App::getLocale();

        // 1. 基础查询：必须是已发布的
        $query = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        // 2. 处理分类筛选
        $currentCategory = null;
        if ($slug) {
            $currentCategory = NewsCategory::where("slug->{$locale}", $slug)
                ->orWhere('slug->en', $slug)
                ->firstOrFail();

            // 如果有子分类逻辑，可以在这里扩展 whereIn，这里暂时只查当前分类
            $query->where('category_id', $currentCategory->id);
        }

        // 3. 处理搜索 (Sidebar Search)
        if ($request->has('q') && $request->filled('q')) {
            $keyword = $request->input('q');
            $query->where(function ($q) use ($keyword, $locale) {
                $q->where("title->{$locale}", 'like', "%{$keyword}%")
                    ->orWhere("content->{$locale}", 'like', "%{$keyword}%");
            });
        }

        // 4. 获取置顶新闻 (Featured)
        // 规则：取最新的一条标记为 is_featured 的新闻
        // 如果当前有分类筛选，则取该分类下的置顶；如果是搜索状态，不显示置顶大图
        $featuredNews = null;
        if (!$request->has('q') && $request->input('page', 1) == 1) {
            // 克隆一个查询对象来查置顶，以免影响主列表
            $featuredQuery = clone $query;
            $featuredNews = $featuredQuery->where('is_featured', true)
                ->orderBy('sort_order')
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->first();
        }

        // 5. 获取主列表 (Entries)
        // 如果有置顶新闻，主列表中要排除掉这一条，避免重复显示
        if ($featuredNews) {
            $query->where('id', '!=', $featuredNews->id);
        }

        $entries = $query->with('category') // 预加载分类，避免 N+1
            ->orderBy('sort_order')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString(); // 保持 URL 参数 (如 search q)

        // 6. 获取侧边栏数据
        $newsCategories = NewsCategory::where('is_visible', true)
            ->withCount('entries') // 统计文章数
            ->orderBy('sort_order')
            ->get();

        // 7. 传递数据
        $this->data['featured_news'] = $featuredNews;
        $this->data['entries'] = $entries;
        $this->data['news_categories'] = $newsCategories;
        $this->data['currentCategory'] = $currentCategory;

        return view('index.news.index', $this->data);
    }

    /**
     * 新闻详细页
     */
    public function show(Request $request, $lang, $slug)
    {
        $locale = App::getLocale();

        // 1. 查找新闻
        $entry = News::where("slug->{$locale}", $slug)
            ->orWhere('slug->en', $slug)
            ->with('category')
            ->firstOrFail();

        // 2. 增加浏览量 (可以使用 Session 防止刷新重复计数，这里简单实现)
        $entry->increment('views');

        // 3. 获取上一篇 / 下一篇
        // 逻辑：按前台展示顺序（sort_order, id）排序
        $prevEntry = News::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where(function ($query) use ($entry) {
                $query->where('sort_order', '<', $entry->sort_order)
                    ->orWhere(function ($subQuery) use ($entry) {
                        $subQuery->where('sort_order', $entry->sort_order)
                            ->where('id', '<', $entry->id);
                    });
            })
            ->orderByDesc('sort_order')
            ->orderByDesc('id')
            ->first();

        $nextEntry = News::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where(function ($query) use ($entry) {
                $query->where('sort_order', '>', $entry->sort_order)
                    ->orWhere(function ($subQuery) use ($entry) {
                        $subQuery->where('sort_order', $entry->sort_order)
                            ->where('id', '>', $entry->id);
                    });
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->first();

        // 4. 获取相关新闻 (同分类下的最新几条，排除自己)
        $relatedNews = collect();
        if ($entry->category_id) {
            $relatedNews = News::where('category_id', $entry->category_id)
                ->where('id', '!=', $entry->id)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderBy('sort_order')
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->limit(3)
                ->get();
        }

        // 5. 获取侧边栏分类 (如果详情页也需要侧边栏的话，如果不需要可省略)
        $newsCategories = NewsCategory::where('is_visible', true)
            ->withCount('entries') // 统计文章数
            ->orderBy('sort_order')
            ->get();

        $this->data['entry'] = $entry;
        $this->data['prevEntry'] = $prevEntry;
        $this->data['nextEntry'] = $nextEntry;
        $this->data['news_categories'] = $newsCategories;
        $this->data['relatedNews'] = $relatedNews;

        return view('index.news.show', $this->data);
    }
}
