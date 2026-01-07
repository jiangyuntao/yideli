<?php

use Illuminate\Support\Facades\Route;

// 1. 根目录自动跳转到默认语言 (例如 / -> /en)
Route::get('/', function () {
    return redirect('/en');
});

// 2. 带语言前缀的路由组
Route::group(
    [
        'prefix' => '{lang}',
        'where' => ['lang' => 'en|zh|fr|es|ru|ar'] // 在路由层面也做一次正则限制
    ],
    function () {
        Route::get('/', 'App\Http\Controllers\Index\IndexController@index')->name('index');
        Route::get('/products/{slug?}', 'App\Http\Controllers\Index\ProductController@index')->name('product.index');
        Route::get('/product/{slug}', 'App\Http\Controllers\Index\ProductController@show')->name('product.show');
        Route::get('/news/{slug?}', 'App\Http\Controllers\Index\NewsController@index')->name('news.index');
        Route::get('/news/show/{slug}', 'App\Http\Controllers\Index\NewsController@show')->name('news.show');
        Route::get('/page/{slug}', 'App\Http\Controllers\Index\PageController@show')->name('page.show');
        Route::get('/inquire', 'App\Http\Controllers\Index\InquireController@form')->name('inquire.form');
        Route::get('/production-process', 'App\Http\Controllers\Index\ProductionProcessController@index')->name('production-process');
    }
);
