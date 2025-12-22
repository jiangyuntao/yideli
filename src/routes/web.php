<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Index\IndexController@index')->name('index');
Route::get('/products', 'App\Http\Controllers\Index\ProductController@index')->name('product.index');
Route::get('/products/{slug}', 'App\Http\Controllers\Index\ProductController@show')->name('product.show');
Route::get('/news', 'App\Http\Controllers\Index\NewsController@index')->name('news.index');
Route::get('/news/{slug}', 'App\Http\Controllers\Index\NewsController@show')->name('news.show');
Route::get('/page/{slug}', 'App\Http\Controllers\Index\PageController@show')->name('page.show');
Route::get('/inquire', 'App\Http\Controllers\Index\InquireController@form')->name('inquire.form');
