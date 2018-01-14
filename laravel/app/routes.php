<?php


// Index du site
Route::get('/', 'RecipeController@listRecipes');

// Routes du  CRUD
Route::get('/addRecipe', 'RecipeController@showPage');
Route::post('/addRecipe', 'RecipeController@addRecipe');


Route::get('/{id}/show', 'RecipeController@showRecipe');
Route::get('/{id}/update', 'RecipeController@updateRecipeForm');
Route::post('/{id}/update', 'RecipeController@updateRecipe');
Route::get('/{id}/delete', 'RecipeController@deleteRecipe');

Route::get('/addIngredient', 'IngredientController@showIngredientForm');
Route::post('/addIngredient', 'IngredientController@addIngredient');

// Gestion de l'autocompletion des ingrédients
Route::get('/ingredients.json', 'IngredientController@listAllIngredients');
Route::post('/ingredients', 'IngredientController@listAllIngredients');






