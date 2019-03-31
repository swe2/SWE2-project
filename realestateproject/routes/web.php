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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile','ProfileController@profile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admindashboard','AdminDashBoard@showdashboard');
Route::get('/adminshowadduser','AdminDashBoard@showadduser');
Route::post('/adminadduser','AdminDashBoard@register');
Route::get('/adminshowcreate','AdminDashBoard@showarticel');
Route::post('/adminstorearticle','AdminDashBoard@storearticle');
Route::resource('/articles','ArticlesController');
Route::get('/editeprofile', 'ProfileController@editeprofile');
Route::post('/updateprofile', 'ProfileController@updateprofile');
Route::post('/adminignore/{id}', 'AdminDashBoard@destroyarticle');
Route::post('/adminapprove/{id}', 'AdminDashBoard@approvearticle');