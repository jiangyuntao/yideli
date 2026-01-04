<?php

use Illuminate\Support\Facades\Route;

Route::get('/{lang?}', 'App\Http\Controllers\Index\IndexController@index')->name('index');
Route::get('/{lang?}/products/{slug?}', 'App\Http\Controllers\Index\ProductController@index')->name('product.index');
Route::get('/{lang?}/product/{slug}', 'App\Http\Controllers\Index\ProductController@show')->name('product.show');
Route::get('/{lang?}/news/{slug?}', 'App\Http\Controllers\Index\NewsController@index')->name('news.index');
Route::get('/{lang?}/news/show/{slug}', 'App\Http\Controllers\Index\NewsController@show')->name('news.show');
Route::get('/{lang?}/page/{slug}', 'App\Http\Controllers\Index\PageController@show')->name('page.show');
Route::get('/{lang?}/inquire', 'App\Http\Controllers\Index\InquireController@form')->name('inquire.form');
Route::get('/{lang?}/production-process', 'App\Http\Controllers\Index\ProductionProcessController@index')->name('production-process');
