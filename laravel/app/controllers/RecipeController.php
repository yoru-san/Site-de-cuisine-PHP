<?php 

class RecipeController extends BaseController {
    

    public function listRecipes() {
        $recipes = Recipe::all();
	$categories =  array();
	foreach ($recipes as $rec) {
		$category = Category::where('id', $rec->id_category)->first();
		array_push($categories, $category);
	}
	return View::make('site.index')->with(array('recipes'=> $recipes, 'category' => $categories));
    }
    
    public function showRecipe($id) {
        //$recipe = Recipe::find($id);
        $recipe = Recipe::where('id',$id) -> first();
        $category = Category::where('id', $recipe->id_category)-> first();  
        //print_r($category);
        $ingredients = DB::table('ingredients')
        ->join('recipe_ingredients', 'ingredients.id', '=', 'recipe_ingredients.id_ingredient')
        ->select('ingredients.name')
        ->where('id_recipe', '=', $recipe->id)
        ->get();
        
        $tabIngredient="";
        foreach ($ingredients as $ing) {
            $aConcatener =  $ing->name . ',';
            $tabIngredient .= $aConcatener;
            }
      
        return View::make('site.showRecipe')->with(array('recipe'=> $recipe,'category'=> $category, 'tabIngredient'=> $tabIngredient));
    }
    
    public function showPage() {
        return View::make('site.addRecipe');
    }   
    
    public function addRecipe() {
      
        
        $ingredients = (Input::get('ingredients'));
        
        $realIngredients = array();
        
        foreach ($ingredients as $ing) {
            $existIng = Ingredient::where('name', '=', $ing)->first();
            if ($existIng === null) {
                print($ing);
                print_r('il exsiste pas ton truc');
                return View::make('site.addRecipe')->with('existing', $existIng);
            }
            // print_r(array('id_ingredient' => $existIng->id, 'id_recipe' => null));
            
            array_push($realIngredients, $existIng);
        }
        $recipe = new Recipe();
        $recipe->title = Input::get('title');
        $recipe->description = Input::get('description');
        $recipe->id_category = Input::get('recipe_category');
        $recipe->image = Input::get('url_image');
        
        $recipe->save(); 
        
        foreach($realIngredients as $ing) {
            DB::table('recipe_ingredients')->insert(
                array('id_ingredient' => $ing->id, 'id_recipe' => $recipe->id)
            );
        }

        return Redirect::to('/');	
       
        
        
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
