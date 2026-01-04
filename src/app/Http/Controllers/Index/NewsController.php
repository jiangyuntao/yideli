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
            ->orderBy('sort_order','asc')
            ->orderBy('id', 'asc')
            ->get();

        if ($slug) {
            $current_category = $this->data['news_categories']->where('slug', $slug)->first();
        } else {
            $current_category = null;
        }

        $this->data['entries'] = News::where(function ($query) use ($request, $current_category) {
                if ($current_category) {
                    $query->where('category_id', $current_category->id);
                }

                if ($request->has('search')) {
                    $query->where('title', 'like', '%'.$request->search.'%');
                }
            })
            ->where('published_at', '<=', now())
            ->orderBy('id','desc')
            ->with('category')
            ->paginate(10);

        return view('index.news.index', $this->data);
    }

    public function show(Request $request)
    {
        return view('index.news.show', $this->data);
    }
}
