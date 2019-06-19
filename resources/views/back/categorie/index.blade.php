@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-md-12 text-right mb-4">
            <a class="btn btn-primary" href="#" role="button">Nouvelle Catégorie</a>
        </div> <!-- ./end div.col-md-12 -->
    </div> <!-- ./end div.row -->

    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col" colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $categorie)
                <tr>
                    <th scope="row">{{ $categorie->categorie }}</th>
                    <td><a class="btn btn-primary" href="#" role="button">Éditer</a></td>
                    <td><a class="btn btn-danger" href="#" role="button">Supprimer</a></td>
                </tr>
                @empty
                <p>Aucune catégorie...</p>
                @endforelse
            </tbody>
        </table>
        <div class="col-md-12 text-right">
                {{ $categories->links() }}
        </div> <!-- ./end div.col-md-12 -->
    </div> <!-- ./end div.row -->
@endsection