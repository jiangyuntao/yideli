<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class FaqController extends BaseController
{
    public function index(Request $request)
    {
        return view('index.faq.index', $this->data);
    }
}

