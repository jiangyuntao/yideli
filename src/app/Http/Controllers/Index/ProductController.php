<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index(Request $request)
    {
        return view('index.product.index', $this->data);
    }

    public function show(Request $request)
    {
        return view('index.product.show', $this->data);
    }
}
