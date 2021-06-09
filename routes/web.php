<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('hello', 'HelloController@index');
Route::get('person', 'PersonController@index');
Route::get('board', 'BoardController@index');
Route::get('hello/show', 'HelloController@show');
Route::post('hello', 'HelloController@post');
Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');
Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');
Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');
Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');
Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');
Route::get('board/auth', 'BoardController@getAuth');
Route::post('board/auth', 'BoardController@postAuth');
Route::get('/top', 'BoardController@top');
Route::get('hello/other', 'HelloController@other');
Route::get('single', 'singleActionController');
Route::get('reqres', 'reqResController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');