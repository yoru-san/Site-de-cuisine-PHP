<?php



Route::get('/', 'RecipeController@listRecipes');

Route::get('/addRecipe', 'RecipeController@showPage');
Route::post('/addRecipe', 'RecipeController@addRecipe');


Route::get('/{id}/show', 'RecipeController@showRecipe');
Route::get('/{id}/update', 'RecipeController@updateRecipe');
Route::get('/{id}/delete', 'RecipeController@deleteRecipe');

Route::get('/addIngredient', 'IngredientController@showIngredientForm');
Route::post('/addIngredient', 'IngredientController@addIngredient');


Route::get('/ingredients', 'IngredientController@listAllIngredients');
Route::post('/ingredients', 'IngredientController@listAllIngredients');






