@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right mb-4">
            <a class="btn btn-primary" href="#" role="button">Nouveau Produit</a>
        </div> <!-- ./end div.col-md-12 -->
    </div> <!-- ./end div.row -->

    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Prix</th>
                    <th scope="col">État</th>
                    <th scope="col">Visibilité</th>
                    <th scope="col" colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                <tr>
                    <th scope="row">{{ $product->name }}</th>
                    <td>{{ $product->categorie->categorie }}</td>
                    <td>{{ $product->price }}€</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->visibility }}</td>
                    <td><a class="btn btn-primary" href="#" role="button">Éditer</a></td>
                    <td>
                        <form class="delete" method="POST" action="{{route('products.destroy', $product->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
                @empty
                <p>Aucun produit...</p>
                @endforelse
            </tbody>
        </table>
        <div class="col-md-12 text-right">
                {{ $products->links() }}
        </div> <!-- ./end div.col-md-12 -->
    </div> <!-- ./end div.row -->
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/confirm.js') }}"></script>
@endsection