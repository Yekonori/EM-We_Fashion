@extends('layouts.master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-8">
            <img class="img-fluid" src="{{ asset('images/'.$product->picture) }}" alt="product picture">
        </div> <!-- ./end div.col-md-8 -->

        <div class="col-md-4">
            <p>Nom : {{ $product->name }}</p>
            <p>Vêtement pour {{ $product->categorie->categorie }}</p>
            <p>Prix : {{ $product->price }}€</p>
            <p>N° de Référence : {{ $product->reference }}</p>
            @if( $product->status === 'sale' )
            <p class="text-uppercase font-weight-bold text-danger">En solde</p>
            @endif
            <select class="form-control mb-4" name="sizeSelect" id="sizeSelect">
                @forelse(explode(',', $product->size) as $size)
                <!-- Make an option for each size the product have -->
                <option value="{{ $size }}">{{ $size }}</option>
                @empty
                <option value="" class="text-uppercase">--- Aucune taille ---</option>
                @endforelse
            </select>
            @if( $product->visibility === 'published' )
            <a class="btn btn-primary" href="#" role="button">Acheter</a>
            @else
            <!-- If the product's visibility isn't 'published' -->
            <p class="alert alert-danger">Ce produit n'est plus disponible à la vente</p>
            @endif
        </div> <!-- ./end div.col-md-4 -->
    </div> <!-- ./end div.row -->

    <div class="row">
        <div class="col-md-12">
            <p>{{ $product->description }}</p>
        </div> <!-- ./end div.col-md-12 -->
    </div> <!-- ./end div.row -->
@endsection