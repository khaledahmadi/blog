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


//Home Directory or Index 
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getIndex']);

//About Page
Route::get('about',['as' => 'about', 'uses' => 'PagesController@getAbout']);

//Conatact Page
Route::get('contact',['as' => 'contact', 'uses' => 'PagesController@getContact']);
Route::post('contact','PagesController@postContact');
//CURD Route
Route::resource('posts','PostController');

//ViewMore 
//Route::get('view/{id}','PagesController@getView');

//display specific blog when u enter data on url slug
Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'blogController@getSingle'])->where('slug','[\w\d\-\_]+');

//Display all the blogs
Route::get('blog',['as' => 'blog', 'uses' => 'blogController@getIndex']);

//User Authentication
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//categories
Route::resource('categories', 'CategoryController');

//tags
Route::resource('tags','TagController');

//Comments
Route::post('comments/{post_id}',['uses' => 'CommentController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit',['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}',['uses' => 'CommentController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}',['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);



