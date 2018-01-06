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
            $ing->name = Input::get('name');
            $ing->unite = Input::get('unite');
            $ing->save();
            return Redirect::to('/');
        } 
        return View::make('site.addIngredient')->with('existing', $existIng);
    }
        


}