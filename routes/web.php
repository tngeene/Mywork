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
    Route::get('auth/login','Auth\LoginController@getLogin');
    Route::post('auth/login','Auth\LoginController@postLogin');
    Route::get('auth/logout','Auth\LoginController@getLogout');

    //Registration routes
    Route::get('auth/register','Auth\RegisterController@getRegister');
    Route::post('auth/register','Auth\RegisterController@postRegister');

    Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
    Route::get('about2', 'PagesController@getAbout');
    Route::get('contact2', 'PagesController@getContact');
    Route::get('/', 'PagesController@getWelcome');
    Route::get('dashboard', 'PagesController@getDashboard');
    Route::get('login','pagesController@getLogin');
    Route::resource('posts', 'PostController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
