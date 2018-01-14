<?php 
//Fichier de controller pour les ingrédients
class IngredientController extends BaseController {

    //Page d'ajout d'un ingrédient
    public function showIngredientForm() {
        return View::make('site.addIngredient');
    }

    //Ajout d'un ingrédient en base
    public function addIngredient() { 
        $inputs = Input::all();
        $existIng = Ingredient::where('name', '=', Input::get('name'))->first();
        if ($existIng === null) {
            $ing = new Ingredient();
            $ing->name = strtolower (Input::get('name'));
            $ing->unite = Input::get('unite');
            $ing->save();
            return Redirect::to('/');
        } 
        return View::make('site.addIngredient')->with('existing', $existIng);
    }

    //tableau de tout les noms d'ingrédients pour la fonctionnalité d'autocompletion
    public function listAllIngredients() {
        $ingredients = Ingredient::all();
        $arrayIngredient  = array();
        foreach ($ingredients as $ing) {
        array_push($arrayIngredient, $ing->name);
        }
        return Response::json($ingredients);
    }
        


}