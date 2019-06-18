<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>We Fashion</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                Place du menu
            </div> <!-- ./end div.col-md-12 -->
        </div> <!-- ./end div.row -->

        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div> <!-- ./end div.col-md-12 -->
        </div> <!-- ./end div.row -->
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>