<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class ProductionProcessController extends BaseController
{
    public function index(Request $request)
    {
        // Keep the original /production-process URL while rendering the existing page template.
        return view('index.page.production-process', $this->data);
    }
}
