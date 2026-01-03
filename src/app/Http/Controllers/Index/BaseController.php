<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected array $data = [];

    public function __construct(Request $request)
    {
        $this->data['lang'] = $request->segment(1) ?? 'en';
        $this->data['settings'] = app('App\Settings\GeneralSettings');
    }
}
