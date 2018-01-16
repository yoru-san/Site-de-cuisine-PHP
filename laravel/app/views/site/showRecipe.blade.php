@extends('site.layout')
@section('main')

<div class="row">
    <div class="col-md-offset-2 col-md-6">
        <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">{{$recipe->title}}</h2>
        </div>
        <div class="col-md-4">
                <span class="label label-{{$category->css_class}}" style="float:right; margin-top:35px;">{{$category->name}}</span>
            </div>
        </div>
        
        <img class="img-rounded img-responsive" src="{{url($recipe->image)}}" alt="image de la recette">
        <label>Description et préparation :</label>        
        <p class="text-center">{{$recipe->description}}</p>
        
        <label>Ingrédient requis :</label>
        <input type="text" value="{{$tabIngredient}}" data-role="tagsinput" >
    </div>
</div>

@endsection