<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function show(Request $request, $lang, $slug)
    {
        if (in_array($slug, ['about-us', 'production-process'])) {
            $view = $slug;
        } else {
            $view = 'show';
        }

        return view('index.page.' . $view, $this->data);
    }
}
