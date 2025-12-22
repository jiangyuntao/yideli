<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class NewsController extends BaseController
{
    public function index(Request $request)
    {
        return view('index.news.index', $this->data);
    }

    public function show(Request $request)
    {
        return view('index.news.show', $this->data);
    }
}
