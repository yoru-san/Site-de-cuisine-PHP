<?php 
// Fichier de controller des recettes
class RecipeController extends BaseController { 
    
    // Affichage de la page d'ajout d'une recette
    public function showPage() {
        return View::make('site.addRecipe');
    }   
    
    // Liste de toutes les recettes pour l'affichage dans l'index
    public function listRecipes() {
        $recipes = Recipe::all();
        $categories =  array();
        foreach ($recipes as $rec) {
            $category = Category::where('id', $rec->id_category)->first();
            array_push($categories, $category);
        }
        return View::make('site.index')->with(array('recipes'=> $recipes, 'category' => $categories));
    }
    
    // Affichage unique d'une recette selon l'id
    public function showRecipe($id) {
        //$recipe = Recipe::find($id);
        $recipe = Recipe::where('id',$id) -> first();
        $category = Category::where('id', $recipe->id_category)-> first(); 
        
        // Jointure pour récuperer les ingrédients correspondants à la recette 
        $ingredients = DB::table('ingredients')
        ->join('recipe_ingredients', 'ingredients.id', '=', 'recipe_ingredients.id_ingredient')
        ->select('ingredients.name')
        ->where('id_recipe', '=', $recipe->id)
        ->get();
        
        // On concatene en string les nom des ingrédient séparé d'une virgule pour pouvoir l'utiliser en tags  
        $tabIngredient="";
        foreach ($ingredients as $ing) {
            $aConcatener =  $ing->name . ',';
            $tabIngredient .= $aConcatener;
        }
        
        return View::make('site.showRecipe')->with(array('recipe'=> $recipe,'category'=> $category, 'tabIngredient'=> $tabIngredient));
    }
    
    
    // Ajout d'une recette dans la base
    public function addRecipe() {
        $ingredients = (Input::get('ingredients'));
        if ($ingredients === null) {
            $ingredients = 1;
            print_r('inexistant');
            return View::make('site.addRecipe')->with('ingredients', $ingredients);
        } 
        $realIngredients = array();
        
        // On vérifie que les ingrédients indiqués existent bien en base
        foreach ($ingredients as $idIng) {
            $existIng = Ingredient::where('id', '=', $idIng)->first();
            
            if ($existIng === null) {
                $existIng = 1;
                // L'ingrédient est inexistant, on retourne sur la vue pour indiquer l'erreur
                return View::make('site.addRecipe')->with('existing', $existIng);
            }
            
            // Tout les ingrédients vérifiés contenu dans ce tableau
            array_push($realIngredients, $existIng);
        }
        // Création de la recette
        $recipe = new Recipe();
        $recipe->title = Input::get('title');
        $recipe->description = Input::get('description');
        $recipe->id_category = Input::get('recipe_category');
        $recipe->image = Input::get('url_image');
        
        $recipe->save(); 
        
        // On remplit correctement la table pivot recipe_ingredient pour pouvoir récuperer les ingrédients plus tard
        foreach($realIngredients as $ing) {
            DB::table('recipe_ingredients')->insert(
                array('id_ingredient' => $ing->id, 'id_recipe' => $recipe->id)
            );
        }
        
        return Redirect::to('/');   
    }
    
    // Suppression d'une recette selon son id
    public function deleteRecipe($id) {
        $recipe = Recipe::find($id);
        $recipe->delete();
        
        return Redirect::to('/');	
        
    }
    
    public function updateRecipeForm($id) {
        $recipe = Recipe::find($id);
        
        $ingredients = DB::table('ingredients')
        ->join('recipe_ingredients', 'ingredients.id', '=', 'recipe_ingredients.id_ingredient')
        ->select('ingredients.name', 'ingredients.id')
        ->where('id_recipe', '=', $recipe->id)
        ->get();
        
        // On retourne sur la vue pour indiquer les anciennes informations sur la recette
        return View::make('site.updateRecipe')->with(array('recipe' => $recipe, 'ingredients' => $ingredients));
    }
    
    // Mise à jour d'une recette selon son id
    public function updateRecipe($id) {
        $recipe = Recipe::find($id);
        //On récupère tout les ingrédients de la recette pour les supprimer en vu du prochain rajout
        $ingredients = DB::table('recipe_ingredients')
        ->where('id_recipe', '=', $recipe->id)
        ->delete();
        
        // On récupère les nouveaux ingrédients
        $ingredients = (Input::get('ingredients'));
        if ($ingredients === null) {
            $ingredients = array();
            return View::make('site.updateRecipe')->with(array('ingredients'=> $ingredients, 'recipe' => $recipe));
        } 
        $realIngredients = array();
        
        // On vérifie que les ingrédients indiqués existent bien en base
        foreach ($ingredients as $idIng) {
            $existIng = Ingredient::where('id', '=', $idIng)->first();
            
            if ($existIng === null) {
                $existIng = 1;
                // L'ingrédient est inexistant, on retourne sur la vue pour indiquer l'erreur
                return View::make('site.updateRecipe')->with(array('existing'=> $existIng, 'recipe' => $recipe));
            }
            // Tout les ingrédients vérifiés contenu dans ce tableau
            array_push($realIngredients, $existIng);
        }
        
        // On récupere les autres informations
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
}
