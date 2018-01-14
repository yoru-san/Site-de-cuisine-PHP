<?php 
// Fichier de controller de fonctionnalité de recherche
class SearchController extends BaseController {  

    public function searchInBase() {
        $toSearch = Input::get('search');

        $ingredients = Ingredient::whereRaw('LOWER(name) LIKE ?', ['%' . $toSearch . '%'])->get();
        $recipes = Recipe::whereRaw('LOWER(title) LIKE ? OR LOWER(description) LIKE ?', ['%' . $toSearch . '%', '%' . $toSearch . '%'])->get();
        return View::make('site.searchResults')->with(array('ingredients' => $ingredients, 'recipes' => $recipes));
    }
}