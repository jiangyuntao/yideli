<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class InquireController extends BaseController
{
    public function form(Request $request)
    {
        return view('index.inquire.form', $this->data);
    }
}
