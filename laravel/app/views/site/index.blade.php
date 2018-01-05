@extends('site.layout')
@section('main')
    C'est ma page d'accueil !

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tableau des recettes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row"><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Nom</th><th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Type</th></tr>
                </thead>
                <tbody>   
                @foreach ($recipe as $rec)
                <tr role="row" class="even">
                  <td><a>{{$rec->title}}</a></td>
                  <td>{{$rec->id_category}}</td>
                  <td><a class="btn btn-warning" href="{{url('/' . $rec->id . '/update')}}">Modifier</a></td>
                  <td><a class="btn btn-danger" href="{{url( $rec->id . '/delete')}}">Supprimer</a></td>

                  
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection