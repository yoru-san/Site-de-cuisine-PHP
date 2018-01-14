@extends('site.layout')
@section('main')

<h3>Veuillez mettre a jour la recette "{{$recipe->title}}" </h3>
    <div class="box box-primary">
  <div class="box-header with-border">
      <h3 class="box-title">Ajouter une recette</h3>
    </div>
          
  <form method="post">
    <div class="form-group">
      <label>Nom de la recette</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="title" value="{{$recipe->title}}">
    </div>
    <div class="form-group">
     <label>Description de la recette</label>
     <textarea class="form-control"  rows="3" name="description" placeholder="Description" >{{$recipe->description}}</textarea>
   </div>

  <div class="form-group">
    <label for="sel1">Type de la recette</label>
    <select class="form-control" id="sel1" name="recipe_category">
      <option value="1" >Amuse-bouche</option>
      <option value="2">Entrée</option>
      <option value="3">Plat principal</option>
      <option value="4">Dessert</option>
    </select>
  </div>

  <div class="form-group">
    <label>Image de la recette</label>
    <input type="url" class="form-control" name="url_image" placeholder="URL" value="{{$recipe->image}}">
    <small id="emailHelp" class="form-text text-muted">Veuillez mettre un lien vers l'image</small>
  </div>
  <div id="ingredientsInputs"></div>

  <div class="form-group">
    <label>Liste des ingredients</label><br>
    <input type="text" class="form-control" value="" id="ingredientList" autocomplete="off"><br>
    <small id="emailHelp" class="form-text text-muted">Barre espace pour ajouter les ingrédients à votre recette</small>
  </div>
  
  <input type="submit" value="Sauvegarder">

</form>
</div>


<script>
    $(document).ready(function() {
      var ingredients = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: {
          url: '{{url( "/ingredients.json")}}',
          cache: false
        }
      });
      ingredients.initialize();
  
  
      $('#ingredientList').tagsinput({
        confirmKeys: [32],
        itemValue: 'name',
        itemText: 'name',
        typeaheadjs: {
          name: 'ingredients',
          displayKey: 'name',
          source: ingredients.ttAdapter()
        }
      });
  
      $('#ingredientList').on('itemAdded', function(event) {
        addIngredient();
      });
  
      $('#ingredientList').on('itemRemoved', function(event) {
        addIngredient();
      });
  });
  
    function addIngredient() {
      var ingredients = $("#ingredientList").tagsinput('items');
  
      $("#ingredientsInputs").html("");
      for(var i = 0; i < ingredients.length; i++) {
        $("#ingredientsInputs").append("<input type=\"hidden\" name=\"ingredients[]\" value=\"" + ingredients[i].id + "\">");
        }
      
  
    }
  </script>

@endsection