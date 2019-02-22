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

Route::post('/posts/post/comment', [
    'uses' => 'CommentsController@store',
    'as' => 'posts.post'
]);

Route::post('/posts/post/reply', [
    'uses' => 'RepliesController@store',
    'as' => 'posts.post'
]);

Route::get('/', 'PostsController@index');



Route::get('/home', [
    'uses' => 'PostsController@index',
    'as' => 'index'
]);

Route::get('/home/action', [
    'uses' => 'PostsController@action',
    'as' => 'index.action'
]);

Route::get('/post', 'PostsController@index');

Route::get('/posts/post/{id}', [
    'uses' => 'PostsController@show',
    'as' => 'posts.post'
]);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::group(['middleware'=>'admin'], function() {

    Route::get('/admin/posts', [
        'uses' => 'AdminPostsController@index',
        'as' => 'admin.posts.index'
    ]);

    Route::get('/admin/posts/create', [
        'uses' => 'AdminPostsController@create',
        'as' => 'admin.posts.create'
    ]);

    Route::post('/admin/posts/create', [
        'uses' => 'AdminPostsController@store',
        'as' => 'admin.posts.create'
    ]);

    Route::get('/admin/posts/edit/{id}', [
        'uses' => 'AdminPostsController@edit',
        'as' => 'admin.posts.edit'
    ]);

    Route::patch('/admin/posts/update/{id}', [
        'uses' => 'AdminPostsController@update',
        'as' => 'admin.posts.update'
    ]);

    Route::delete('/admin/posts/delete/{id}', [
        'uses' => 'AdminPostsController@destroy',
        'as' => 'admin.posts.delete'
    ]);

    Route::get('/admin/users', [
        'uses' => 'AdminUsersController@index',
        'as' => 'admin.users.index'
    ]);

    Route::delete('/admin/users/delete/{id}', [
        'uses' => 'AdminUsersController@destroy',
        'as' => 'admin.users.delete'
    ]);

    Route::get('/admin/comments', [
        'uses' => 'AdminCommentsController@index',
        'as' => 'admin.comments.index'
    ]);

    Route::delete('/admin/comments/delete/{id}', [
        'uses' => 'AdminCommentsController@destroy',
        'as' => 'admin.comments.delete'
    ]);

});






//Route::get('/home', 'HomeController@index')->name('home');
