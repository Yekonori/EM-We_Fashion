@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <!-- Display the total number of products -->
            <p>{{ $products->total() }} résultats</p>
        </div> <!-- ./end div.col-md-12 -->
    </div> <!-- ./end div.row -->

    <div class="row">
        @forelse($products as $product)
        <a href="{{ url('product', $product->id) }}">
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top imgHeight" src="{{ asset('images/'.$product->picture) }}" alt="product picture">
                    <div class="card-body cardBodyHeight">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }}€</p>
                    </div>
                </div>
            </div> <!-- ./end div.col-md-4 -->
        </a>
        @empty
        @endforelse
        <div class="col-md-12 text-right">
            <!-- The pagination -->
            {{ $products->links() }}
        </div> <!-- ./end div.col-md-12 -->
    </div> <!-- ./end div.row -->
@endsection