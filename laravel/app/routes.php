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
	$recipe = Recipe::all();
	return View::make('site.index')->with('recipe', $recipe);
});

//Route::get('/listRecipes', 'RecipeController@showRecipe');
Route::get('/addRecipe', 'RecipeController@showPage');
Route::post('/addRecipe', 'RecipeController@addRecipe');


Route::get('/{id}/showRecipe', 'RecipeController@showRecipe');
Route::get('/{id}/update', 'RecipeController@updateRecipe');
Route::get('/{id}/delete', 'RecipeController@deleteRecipe');

Route::get('/addIngredient', 'IngredientController@showIngredientForm');
Route::post('/addIngredient', 'IngredientController@addIngredient');



