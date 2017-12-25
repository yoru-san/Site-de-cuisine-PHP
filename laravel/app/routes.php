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

Route::get('/', function()
{
	return View::make('site.index');
});

Route::get('/listRecipes', 'RecipeController@showRecipe');
Route::get('/addRecipe', 'RecipeController@addRecipe');
Route::get('/{id}/update', 'RecipeController@updateRecipe');
Route::get('/{id}/delete', 'RecipeController@deleteRecipe');

