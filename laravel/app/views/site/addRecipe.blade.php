@extends('site.layout')
@section('main')

<div class="box box-primary">
  <div class="box-header with-border">
      <h3 class="box-title">Ajouter une recette</h3>
    </div>
          
  <form method="post" action="#">
    <div class="form-group">
      <label>Nom de la recette</label>
      <input type="email" class="form-control"  aria-describedby="emailHelp" name="title" placeholder="Nom">
    </div>
    <div class="form-group">
     <label>Description de la recette</label>
     <textarea class="form-control"  rows="3" name="description" placeholder="Description"></textarea>
   </div>

  <div class="form-group">
    <label for="sel1">Type de la recette</label>
    <select class="form-control" id="sel1">
      <option>Amuse-bouche</option>
      <option>Entrée</option>
      <option>Plat principal</option>
      <option>Dessert</option>
    </select>
  </div>

  <div class="form-group">
    <label>Image de la recette</label>
    <input type="url" class="form-control" name="url_image" placeholder="URL">
    <small id="emailHelp" class="form-text text-muted">Veuillez mettre un lien vers l'image</small>
  </div>

  <div id="ingredientsInputs"></div>

  <div class="form-group">
    <label>Liste des ingredients</label><br>
    <input type="text" class="form-control" value="" id="ingredientList"><br>
    <small id="emailHelp" class="form-text text-muted">Espace pour valider, PAS ENTRER, putain</small>
  </div>

  <input type="submit" value="Ajouter">

</form>
</div>

<script>
  $(document).ready(function() {
    $('#ingredientList').tagsinput({
      confirmKeys: [32]
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
      $("#ingredientsInputs").append("<input type=\"hidden\" name=\"ingredients[]\" value=\"" + ingredients[i] + "\">");
    }
  }
</script>


@endsection