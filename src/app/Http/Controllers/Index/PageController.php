<?php

namespace App\Http\Controllers\Index;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function show(Request $request, $lang, $slug)
    {
        if (in_array($slug, ['about-us', 'production-process'])) {
            $view = $slug;
        } else {
            $view = 'show';

            $this->data['page'] = Page::where("slug->{$lang}", $slug)->firstOrFail();
        }

        return view('index.page.' . $view, $this->data);
    }
}
