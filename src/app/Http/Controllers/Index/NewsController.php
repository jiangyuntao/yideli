<?php

namespace App\Http\Controllers\Index;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    public function index(Request $request, $slug = null)
    {
        $this->data['news_categories'] = NewsCategory::whereNull('parent_id')
            ->where('is_visible', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        if ($slug) {
            $current_category = $this->data['news_categories']->where('slug', $slug)->first();
        } else {
            $current_category = null;
        }

        $this->data['featured_news'] = News::where('is_featured', 1)
            ->where('published_at', '<=', now())
            ->orderBy('id', 'desc')
            ->with('category')
            ->first();

        $this->data['entries'] = News::where(function ($query) use ($request, $current_category) {
            if ($current_category) {
                $query->where('category_id', $current_category->id);
            }

            if ($request->has('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }
        })
            ->where('id', '!=', $this->data['featured_news']->id)
            ->where('published_at', '<=', now())
            ->orderBy('id', 'desc')
            ->with('category')
            ->paginate(10);

        return view('index.news.index', $this->data);
    }

    public function show(Request $request, $lang, $slug)
    {
        $this->data['entry'] = News::where('published_at', '<=', now())
            ->where("slug->$lang", $slug)
            ->with('category')
            ->first();

        return view('index.news.show', $this->data);
    }
}
