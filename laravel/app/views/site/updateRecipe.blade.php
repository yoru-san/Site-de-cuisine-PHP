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
      <input type="text" class="form-control"  name="title" value="{{$recipe->title}}">
    </div>
    <div class="form-group">
     <label>Description de la recette</label>
     <textarea class="form-control"  rows="3" name="description" placeholder="Description, n'oubliez pas les quantités de votre recette" >{{$recipe->description}}</textarea>
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
    <small class="form-text text-muted">Veuillez mettre un lien vers l'image</small>
  </div>
  <div id="ingredientsInputs"></div>

  <div class="form-group">
    <label>Liste des ingredients</label><br>
    <input type="text" class="form-control" value="" id="ingredientList" autocomplete="off"><br>
    <small class="form-text text-muted">Veuillez utiliser l'autocompletion pour ajouter vos ingrédients</small>
    <small class="form-text text-muted">Si l'ingrédient n'apparait pas, ajoutez le</small>

  </div>
  
  <input type="submit" value="Sauvegarder">

  
 @if(count($ingredients) == 0)
    <h2 class="text-center">Veuillez indiquer des ingrédient à votre recette</h2>
  @endif

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

      // Récupération des ingrédients pour compléter l'input de l'update
      @foreach ($ingredients as $ingredient)
      $('#ingredientList').tagsinput('add', { id: {{$ingredient->id}}, name: '{{$ingredient->name}}' });
      @endforeach
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