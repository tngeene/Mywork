<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can Register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>['web']], function(){
    //Authentication routes
    Route::get('auth/login',['as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);
    Route::post('auth/login','Auth\LoginController@postLogin');
    Route::get('auth/logout',['as'=>'loggout','uses'=>'Auth\LoginController@logout']);

    //Registration routes
    Route::get('auth/register',['as'=>'register','uses'=>'Auth\RegisterController@getRegister']);
    Route::post('auth/register','Auth\RegisterController@postRegister');

    // Password reset routes
    Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm');
    Route::get('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset','Auth\ForgotPasswordController@showLinkResetForm');
    Route::post('password/reset','Auth\ResetPasswordController@reset');

    //categories
    Route::resource('categories','CategoryController',['except'=>['create']]);

    //tags
    Route::resource('tags','TagController',['except'=>['create']]);
    //comments
    Route::post('comments/{post_id}',['uses' => 'CommentsController@store','as'=>'comments.store']); 
    Route::get('comments/{id}/edit',['uses'=> 'CommentsController@edit', 'as'=>'comments.edit']);
    Route::put('comments/{id}',['uses'=> 'CommentsController@update', 'as'=>'comments.update']);
    Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
	Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

    Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
    Route::get('about', 'PagesController@getAbout');
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');
    Route::get('/', 'PagesController@getWelcome');
    Route::get('dashboard', 'PagesController@getDashboard');
    Route::get('login','pagesController@getLogin');
    Route::resource('posts', 'PostController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

