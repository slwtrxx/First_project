<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['namespace'=>'App\Http\Controllers\Post'], function(){
    Route::get('/posts' , 'App\Http\Controllers\Post\IndexController')->name('post.index');
    Route::get('/posts/create' , 'App\Http\Controllers\Post\CreateController')->name('post.create');

    Route::post('/posts' , 'App\Http\Controllers\Post\StoreController')->name('post.store');
    Route::get('/posts/{post}' , 'App\Http\Controllers\Post\ShowController')->name('post.show');
    Route::get('/posts/{post}/edit' , 'App\Http\Controllers\Post\EditController')->name('post.edit');
    Route::patch('/posts/{post}' , 'App\Http\Controllers\Post\UpdateController')->name('post.update');
    Route::delete('/posts/{post}' , 'App\Http\Controllers\Post\DestroyController')->name('post.delete');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/post', [\App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
});


Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show')->name('post.show');
Route::get('/posts/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::patch('/posts/{post}', 'App\Http\Controllers\PostController@update')->name('post.update');
Route::delete('/posts/{post}', 'App\Http\Controllers\PostController@destroy')->name('post.delete');

Route::get('/posts/update' , 'App\Http\Controllers\PostController@update');
Route::get('/posts/delete' , 'App\Http\Controllers\PostController@delete');
Route::get('/posts/first_or_create' , 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/update_or_create' , 'App\Http\Controllers\PostController@updateOrCreate');



Route::get('/main' , 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/contacts' , 'App\Http\Controllers\ContactController@index')->name('contact.index');
Route::get('/about' , 'App\Http\Controllers\AboutController@index')->name('about.index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
