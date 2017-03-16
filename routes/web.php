<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@login');

Route::post('/', 'HomeController@authenticate');

//Route::get('login', 'HomeController@login');
//
//Route::post('login', 'HomeController@authenticate');

Route::get('home', 'HomeController@homePage');

Route::get('add', function() {
     return view('addclient', ['added' => False]);
});

Route::post('add', 'DBController@addNewClient');

Route::get('clientlist', 'DBController@getClientList');

Route::get('notifications/{sortby?}', 'DBController@getClientNotifications')->where('sortby', '[0-9]');

Route::get('logout', 'HomeController@logout');

Route::get('search', 'DBController@loadsearch');

Route::post('search', 'DBController@search');

Route::get('logvisit', 'DBController@logvisit');
