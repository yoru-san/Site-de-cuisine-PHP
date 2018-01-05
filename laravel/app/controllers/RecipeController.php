<?php 

class RecipeController extends BaseController {


    public function showRecipe($id) {
        $recipe = Recipe($id);
        return View::make('site.showRecipe');
    }

    public function showPage() {
        return View::make('site.addRecipe');
    }   

    public function addRecipe() {
        print_r(Input::get('ingredients'));

    $inputs = Input::all();
	$recipe = new Recipe();
	$recipe->title = Input::get('title');
    $recipe->description = Input::get('description');
	$recipe->category = Input::get('category');
	$recipe->id_description = Input::get('description');
    $recipe->image = Input::get('url_image');
    
    $recipe->save();
	return View::make('site.index');
    }

    public function deleteRecipe($id) {
    $recipe = Recipe::find($id);
    $recipe->delete();
    
    return Redirect::to('/');	

    }


    public function updateRecipe($id) {
        return View::make('site.updateRecipe');

    //return Redirect::to('site/updateRecipe');	
    $recipe = Recipe::find($id);
	$recipe->title = Input::get('title');
    $recipe->description = Input::get('description');
	$recipe->category = Input::get('id_category');
	$recipe->id_description = Input::get('description');
    $recipe->image = Input::get('url_image');

    $recipe->save();
	//return Redirect::to('site/index');	
    }
}
