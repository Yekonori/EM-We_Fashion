@extends('layouts.master')

@section('content')
    <div class="row mb-4">
        <h1>Créer un produit :</h1>
        <div class="col-md-12">
            <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                <!-- Token security -->
                {{ csrf_field() }}
                <!-- The form make a PUT -->
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Nom du produit : </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nom du produit" value="{{ $product->name }}">
                    @if($errors->has('name')) <span class="error text-danger">{{$errors->first('name')}}</span>@endif

                    <label for="description">Description du produit : </label>
                    <textarea class="form-control" id="description" name="description" placeholder="Description du produit" rows="3">{{ $product->description }}</textarea>
                    @if($errors->has('description')) <span class="error text-danger">{{$errors->first('description')}}</span>@endif

                    <label for="price">Prix du produit : </label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Prix du produit" value="{{ $product->price }}">
                    @if($errors->has('price')) <span class="error text-danger">{{$errors->first('price')}}</span>@endif

                    <div class="form-check mt-3 pl-0">
                        <p>Tailles du produit :</p>
                        <input type="checkbox" value="XS" id="XS" name="size[]" {{ (in_array("XS", explode(',', $product->size))) ? 'checked' : '' }}>
                        <label class="form-check-label" for="XS">XS</label>
                        <input type="checkbox" value="S" id="S" name="size[]" {{ (in_array("S", explode(',', $product->size))) ? 'checked' : '' }}>
                        <label class="form-check-label" for="S">S</label>
                        <input type="checkbox" value="M" id="M" name="size[]" {{ (in_array("M", explode(',', $product->size))) ? 'checked' : '' }}>
                        <label class="form-check-label" for="M">M</label>
                        <input type="checkbox" value="L" id="L" name="size[]" {{ (in_array("L", explode(',', $product->size))) ? 'checked' : '' }}>
                        <label class="form-check-label" for="L">L</label>
                        <input type="checkbox" value="XL" id="XL" name="size[]" {{ (in_array("XL", explode(',', $product->size))) ? 'checked' : '' }}>
                        <label class="form-check-label" for="XL">XL</label>
                    </div>
                    @if($errors->has('size')) <span class="error text-danger">{{$errors->first('size')}}</span>@endif

                    <div class="input-file">
                        <h2>Image du produit :</h2>
                        <input class="file" type="file" name="picture" accept="image/png, image/jpeg">
                    </div>
                    @if($errors->has('picture')) <span class="error text-danger">{{$errors->first('picture')}}</span>@endif

                    <div class="form-check mt-3 pl-0">
                        <p>Visibilité du produit :</p>
                        <input type="radio" name="visibility" id="published" value="published" {{ ($product->visibility == 'published') ? 'checked' : '' }}>
                        <label class="form-check-label" for="published">Publié</label>
                        <input type="radio" name="visibility" id="unpublished" value="unpublished" {{ ($product->visibility == 'unpublished') ? 'checked' : '' }}>
                        <label class="form-check-label" for="unpublished">Non publié</label>
                    </div>
                    @if($errors->has('visibility')) <span class="error text-danger">{{$errors->first('visibility')}}</span>@endif

                    <div class="form-check mt-3 pl-0">
                        <p>État du produit :</p>
                        <input type="radio" name="status" id="standard" value="standard" {{ ($product->status == 'standard') ? 'checked' : '' }}>
                        <label class="form-check-label" for="standard">Standard</label>
                        <input type="radio" name="status" id="sale" value="sale" {{ ($product->status == 'sale') ? 'checked' : '' }}>
                        <label class="form-check-label" for="sale">En solde</label>
                    </div>
                    @if($errors->has('status')) <span class="error text-danger">{{$errors->first('status')}}</span>@endif

                    <label for="reference">Référence du produit : </label>
                    <input type="text" class="form-control" name="reference" id="reference" placeholder="Référence du produit" value="{{ $product->reference }}">
                    @if($errors->has('reference')) <span class="error text-danger">{{$errors->first('reference')}}</span>@endif
                    
                    <div class="form-check mt-3 pl-0">
                        <p>Catégorie du produit :</p>
                        @forelse($categories as $id => $name)
                        <input type="radio" name="categorie_id" id="{{ $id }}" value="{{ $id }}" {{ ($product->categorie->id == $id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $id }}">{{ $name }}</label>
                        @empty
                        @endforelse
                    </div>
                    @if($errors->has('categorie_id')) <span class="error text-danger">{{$errors->first('categorie_id')}}</span>@endif
                </div>
                <button type="submit" class="btn btn-primary">Éditer</button>
            </form>
        </div> <!--./end div.col-md-12 -->
    </div> <!-- ./end div.row -->
@endsection