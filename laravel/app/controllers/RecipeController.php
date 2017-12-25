<?php 

class RecipeController extends BaseController {


    public function addRecipe() {
    $inputs = Input::all();
	$recipe = new Recipe();
	$recipe->title = Input::get('title');
    $recipe->description = Input::get('description');
	$recipe->category = Input::get('category');
	$recipe->id_description = Input::get('description');
    $recipe->image = Input::get('url_image');
    
    $recipe->save();
	return View::make('site.addRecipe');
    }

    public function showRecipe() {
    $recipe = Recipe::all();	
	return View::make('site.listRecipes')->with('recipe', $recipe);
    }


    public function updateRecipe() {
    $recipe = Recipe::find($id);
	$recipe->delete();
    }


    public function deleteRecipe() {
    $recipe = Recipe::find($id);
	$recipe->title = Input::get('title');
    $recipe->description = Input::get('description');
	$recipe->category = Input::get('category');
	$recipe->id_description = Input::get('description');
    $recipe->image = Input::get('url_image');

    $recipe->save();
    return View::make('site.listRecipes');
    }
}
