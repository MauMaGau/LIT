<!doctype html>
<html ng-app="Base">
    <head>
        <meta charset="utf-8">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        @include('scaffold.partials.nav')

        <div class="container">

            @if (Session::has('status'))
                <div class="alert alert-success">
                    <p>{{ Session::get('status') }}</p>
                </div>
            @endif

            @if (Session::has('message'))
                <div class="alert alert-info">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endif

            <div class="row">

                @yield('main')

            </div>

        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= URL::asset('js/app.js') ?>" type="text/javascript" charset="utf-8"></script>
    </body>

</html>