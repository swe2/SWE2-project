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
use App\article;


Route::get('/', function () {
	$articles=Article::orderBy('created_at','desc')->get();
	
       return view('articles.index', compact('articles'));
   
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{username}','ProfileController@profile')->name('profile');
Route::get('/editeprofile', 'ProfileController@editeprofile');
Route::post('/updateprofile', 'ProfileController@updateprofile');

Route::get('/admindashboard','AdminDashBoard@showdashboard');
Route::post('/adminignore/{id}', 'AdminDashBoard@destroyarticle');
Route::post('/adminapprove/{id}', 'AdminDashBoard@approvearticle');
Route::get('/adminshowadduser','AdminDashBoard@showadduser');
Route::post('/adminadduser','AdminDashBoard@register');
Route::get('/adminshowcreate','AdminDashBoard@showarticel');
Route::post('/adminstorearticle','AdminDashBoard@storearticle');
Route::get('/article/search','ArticlesController@action')->name('searchadv');
Route::resource('/articles','ArticlesController');
Route::get('send','MailController@send');
Route::post('/addcomment', 'CommentsController@store')->name('commentadd');


