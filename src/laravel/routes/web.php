<?php

use Illuminate\Support\Facades\Route;
use App\Modeld\Article;
use App\Http\Controllers\TagsController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/article/edit/{article}', 'App\Http\Controllers\ArticlesController@edit')
    ->middleware(['auth']);
Route::post('/article/update/{article}', 'App\Http\Controllers\ArticlesController@update');
Route::get('/articles', 'App\Http\Controllers\ArticlesController@index');
Route::get('/article/add', 'App\Http\Controllers\ArticlesController@add');
Route::post('/article/add', 'App\Http\Controllers\ArticlesController@create');

Route::get('/article/delete/{article}', 'App\Http\Controllers\ArticlesController@delete');

// Route::resource('tags', TagsController::class);
Route::resource('tags', TagsController::class)->only([
    'index', 'create', 'store',
]);

require __DIR__.'/auth.php';
