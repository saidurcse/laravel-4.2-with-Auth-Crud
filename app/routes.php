<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});
*/

/*
|--------------------------------------------------------------------------
| This is the first example of log in authentication. Here database
| migration,seed and also sample log in with validation implemented.
|--------------------------------------------------------------------------
*/
//Route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));
//Route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));
//Route to logout the form
Route::get('logout', array('uses' => 'HomeController@doLogout'));



/*
|--------------------------------------------------------------------------
| This is the second example of log in authentication. Here database
| migration,seed is not implemented.Here login , log out and sample
| CRUD example implemented.
|--------------------------------------------------------------------------
*/
Route::get('/', array('uses'=>'AuthorsController@login'));
Route::get('authors', array('as'=>'authors_list','uses'=>'AuthorsController@index'));
Route::get('authors/newAuthor', array('as'=>'new_author','uses'=>'AuthorsController@newAuthor'));
Route::post('authors/saveAuthor', array('as'=>'save_author','uses'=>'AuthorsController@saveAuthor'));
Route::get('authors/updateAuthor', array('as'=>'update_author','uses'=>'AuthorsController@updateAuthor'));
Route::get('authors/{id}', array('as'=>'author','uses'=>'AuthorsController@view'))->where('id', '[0-9]+');
Route::post('authors/saveinfo', array('as'=>'save_info','uses'=>'AuthorsController@saveinfo'));
Route::get('authors/deleteAuthor', array('as'=>'delete_author','uses'=>'AuthorsController@deleteAuthor'));
Route::post('authors/loginAuthor', array('as'=>'loginAuthor','uses'=>'AuthorsController@loginAuthor'));
Route::get('authors/logout', array('as'=>'logout_author','uses'=>'AuthorsController@logout'));




