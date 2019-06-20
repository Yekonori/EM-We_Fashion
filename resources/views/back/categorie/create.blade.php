@extends('layouts.master')

@section('content')
    <div class="row mb-4">
        <h1>Créer une catégorie :</h1>
        <div class="col-md-12">
            <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="categorie">Nom de la catégorie : </label>
                    <input type="text" class="form-control" name="categorie" id="categorie" placeholder="Nom de la catégorie">
                    @if($errors->has('categorie')) <span class="error text-danger">{{$errors->first('categorie')}}</span>@endif
                </div>
                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div> <!--./end div.col-md-12 -->
    </div> <!-- ./end div.row -->
@endsection