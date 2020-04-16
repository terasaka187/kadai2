<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/weeks/index', 'RssController@index')->name('weeks.index');
//search
Route::get('/weeks/search', 'RssController@search')->name('weeks.search');

//create
Route::get('/weeks/create', 'RssController@create')->name('weeks.create');

//delete
Route::get('/weeks/delete', 'RssController@delete')->name('weeks.delete');
