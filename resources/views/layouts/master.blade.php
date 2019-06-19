<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>We Fashion</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Request::is('admin/*'))
                @include('partials.menuAdmin')
                @else
                @include('partials.menu')
                @endif
            </div> <!-- ./end div.col-md-12 -->
        </div> <!-- ./end div.row -->

        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div> <!-- ./end div.col-md-12 -->
        </div> <!-- ./end div.row -->
    </div>

    <footer class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Informations</h3>
                <ul>
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">Presse</a></li>
                    <li><a href="#">Fabrication</a></li>
                </ul>
            </div> <!-- ./end div.col-md-4 -->
            <div class="col-md-4">
                <h3>Service Client</h3>
                <ul>
                    <li><a href="#">Contactez-nous</a></li>
                    <li><a href="#">Livraison & retour</a></li>
                    <li><a href="#">Conditions de vente</a></li>
                </ul>
            </div> <!-- ./end div.col-md-4 -->
            <div class="col-md-4">
                <h3>Réseaux Sociaux</h3>
                <ul>
                    <li><a href="#"><img class="pictoHeight" src="{{ asset('images/pictos/facebook-f-brands.svg') }}" alt="logo facebook"></a></li>
                    <li><a href="#"><img class="pictoHeight" src="{{ asset('images/pictos/instagram-brands.svg') }}" alt="logo instagram"></a></li>
                    <li><a href="#">Inscrivez-vous à la newsletter</a></li>
                </ul>
            </div> <!-- ./end div.col-md-4 -->
        </div> <!-- ./end div.row -->
    </footer>

    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @show
</body>
</html>