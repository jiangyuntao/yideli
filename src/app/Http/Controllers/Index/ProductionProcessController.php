<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class ProductionProcessController extends BaseController
{
    public function index(Request $request)
    {
        return view('index.production-process.index', $this->data);
    }
}
