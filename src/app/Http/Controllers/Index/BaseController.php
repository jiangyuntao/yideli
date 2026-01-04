<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BaseController extends Controller
{
    protected array $data = [];

    public function callAction($method, $parameters)
    {
        $this->data['lang'] = request()->segment(1) ?? 'en';
        App::setLocale($this->data['lang']);

        $this->data['settings'] = app('App\Settings\GeneralSettings');

        return $this->{$method}(...array_values($parameters));
    }
}
