<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Index\IndexController@index')->name('index');
