<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Convo - @yield('title')</title>

        <script>

            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
             ]); ?>

        </script>

        <script src="{{ asset('/js/jquery.js') }}"></script>

        <script src="{{ asset('/js/jquery.form.js') }}"></script>

        <script src="{{ asset('/js/materialize.js') }}"></script>

        <script src="{{ asset('/js/jquery.slimscroll.js') }}"></script>

        <script src="{{ asset('/js/app.js') }}"></script>

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />

        <link href="{{ asset('/css/materialize.css') }}" rel="stylesheet" />

        <script src="{{ asset('/js/socket.io.js') }}"></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>

    <body>

        <input id="BASE_URL" type="hidden" value="{{ URL::to('/') }}"/>

        <div class="container">

            @yield('content')

        </div>

    </body>

</html>