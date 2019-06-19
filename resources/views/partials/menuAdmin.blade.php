<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <p class="navbar-brand fashionLogo">We Fashion</p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ url('/admin/products') }}">Produits</a>
            <a class="nav-item nav-link" href="{{ url('/admin/categories') }}">Catégories</a>
            <a class="nav-item nav-link pictoHome" href="{{ url('/') }}"><img src="{{ asset('images/pictos/home-solid.svg') }}" alt="Home Picto"></a>
        </div>
    </div>
</nav>