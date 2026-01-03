<?php

namespace App\Http\Controllers\Index;

use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index(Request $request)
    {
        $this->data['categories'] = Category::whereNull('parent_id')
            ->limit(4)
            ->get();

        return view('index.index.index', $this->data);
    }
}
