@extends('site.layout')
@section('main')

<h3>Il vous manque un ingrédient pour compléter votre recette ? <br> Venez l'ajouter ici !</h3>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ajouter un ingrédient</h3>
      </div>
            
    <form method="post" action="#">
      <div class="form-group">
        <label>Nom de l'ingrédient</label>
        <input type="text" class="form-control"  aria-describedby="emailHelp" name="name" placeholder="Nom">
      </div>
 
    <div class="form-group">
      <label>Unité de mesure</label>
      <select class="form-control" name="unite">
          <option value="Pièce">Pièce</option>
          <option value="Grammes">Grammes</option>
          <option value="Cuillère à soupe">Cuillère à soupe</option>
          <option value="Cuillère à café">Cuillère à café</option>
          
      </select>
    </div>

    <input type="submit" value="Ajouter">


@if(isset($existing))
  <h2 class="text-center">L'ingrédient existe déjà en base, pas besoin de le recréer.</h2>
@endif

  </form>
  </div>
@endsection