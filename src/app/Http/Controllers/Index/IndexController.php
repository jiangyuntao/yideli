<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index(Request $request)
    {
        return view('index.index.new', $this->data);
    }
}
