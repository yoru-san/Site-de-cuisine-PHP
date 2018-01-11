<?php 

class IngredientController extends BaseController {

    public function showIngredientForm() {
        return View::make('site.addIngredient');

    }

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

    public function listAllIngredients() {
        //tableau de tout les noms d'ingrédients pour la fonctionnalité d'autocompletion
        $ingredients = Ingredient::all();
        $arrayIngredient  = array();
        foreach ($ingredients as $ing) {
        array_push($arrayIngredient, $ing->name);
        }
        // $ingredientTab = "";
        // foreach ($arrayIngredient as $ingred) {
        //     $aConcatener =  $ingred . ',';
        //     $ingredientTab .= $aConcatener;
        //     }

            //print_r($ingredientTab);

        return Response::json($ingredients);


    }
        


}