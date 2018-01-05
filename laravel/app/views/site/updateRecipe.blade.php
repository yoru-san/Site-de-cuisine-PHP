@extends('site.layout')
@section('main')
    C'est ma page de liste de recette !

    <div class="box box-primary">
  <div class="box-header with-border">
      <h3 class="box-title">Ajouter une recette</h3>
    </div>
          
  <form>
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
    <input type="password" class="form-control" name="url_image" placeholder="URL">
    <small id="emailHelp" class="form-text text-muted">Veuillez mettre un lien vers l'image</small>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Ingrédients de la recette</label>
      <input type="password" class="form-control" name="ingredients" placeholder="Ingrédients">
    </div>
  </div>   
</form>
</div>

@endsection