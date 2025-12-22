<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function show(Request $request)
    {
        return view('index.page.show', $this->data);
    }
}
