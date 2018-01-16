<?php 
// Fichier de controller de fonctionnalité de recherche
class SearchController extends BaseController {  
    
    //Fonctionnalité de la recherche de recette/d'ingrédients
    public function searchInBase() {
        $toSearch = Input::get('search');
        
        // On met en minuscule less résultats des colonnes de la base de données avant de les comparer à la recherche de l'utilisateur
        // On utilise des caractères de wildcards (%) pour permettre d'élargir la recherche avec des caractères avant ou après
        $ingredients = Ingredient::whereRaw('LOWER(name) LIKE ?', ['%' . $toSearch . '%'])->get();
        $recipes = Recipe::whereRaw('LOWER(title) LIKE ? OR LOWER(description) LIKE ?', ['%' . $toSearch . '%', '%' . $toSearch . '%'])->get();
        return View::make('site.searchResults')->with(array('ingredients' => $ingredients, 'recipes' => $recipes));
    }
}