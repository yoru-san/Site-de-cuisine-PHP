@extends('site.layout')
@section('main')

<h2>Résultats de la recherche :</h2>
<h3>Recettes :</h3>

<div class="row">
@foreach ($recipes as $recipe)
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="{{url($recipe->image)}}">
            <div class="caption">
              <h3>{{$recipe->title}}</h3>
              <p>{{ str_limit($recipe->description, $limit = 150, $end = '...') }}</p>
              <p><a class="btn btn-primary" href="{{url( $recipe->id . '/show')}}">Voir</a> <a class="btn btn-warning" href="{{url('/' . $recipe->id . '/update')}}">Modifier</a><a class="btn btn-danger" href="{{url( $recipe->id . '/delete')}}">Supprimer</a></p>
            </div>
          </div>
        </div>
@endforeach
</div>

<h3>Ingrédients :</h3>

<div class="list-group">
        @foreach ($ingredients as $ingredient)
        <a href="#" class="list-group-item">
          <h4 class="list-group-item-heading">{{$ingredient->name}}</h4>
          <p class="list-group-item-text">{{$ingredient->unite}}</p>
        </a>
        @endforeach
      </div>
      
@endsection