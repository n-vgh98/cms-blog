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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'admin'], function (){
    Route::resource('admin/users','Admin\AdminUserController');
    Route::resource('admin/posts','Admin\AdminPostController');
    Route::resource('admin/categories','Admin\AdminCategoryController');
    Route::resource('admin/photos','Admin\AdminPhotoController');
    Route::get('admin/dashboard','Admin\DashboardController@index')->name('dashboard.index');
    /*comments backend*/
    Route::get('admin/comments','Admin\CommentController@index')->name('comments.index');
    Route::post('admin/comments/{id}','Admin\CommentController@actions')->name('comments.actions');
    Route::get('admin/comments/{id}','Admin\CommentController@edit')->name('comments.edit');
    Route::patch('admin/comments/{id}','Admin\CommentController@update')->name('comments.update');
    Route::delete('admin/comments/{id}','Admin\CommentController@destroy')->name('comments.destroy');
});
Route::get('/','Frontend\MainController@index');
Route::get('/posts/{slug}','Frontend\PostController@show')->name('frontend.posts.show');
Route::get('/search','Frontend\PostController@searchTitle')->name('frontend.posts.search');
/*comments frontend*/
Route::post('/comment/{postId}','Frontend\CommentController@store')->name('frontend.comments.store');
Route::post('/comment','Frontend\CommentController@reply')->name('frontend.comments.reply');

