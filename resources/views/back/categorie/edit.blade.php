@extends('layouts.master')

@section('content')
    <div class="row mb-4">
        <h1>Créer une catégorie :</h1>
        <div class="col-md-12">
            <form action="{{route('categories.update', $categorie->id)}}" method="post" enctype="multipart/form-data">
                <!-- Token security -->
                {{ csrf_field() }}
                <!-- The form make a PUT -->
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="categorie">Nom de la catégorie : </label>
                    <input type="text" class="form-control" value="{{$categorie->categorie}}" name="categorie" id="categorie" placeholder="Nom de la catégorie">
                </div>
                <button type="submit" class="btn btn-primary">Éditer</button>
            </form>
        </div> <!--./end div.col-md-12 -->
    </div> <!-- ./end div.row -->
@endsection