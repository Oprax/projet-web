<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    @include('layouts/stylesheet')
<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<body>
    <div class="container">
        <div class="ui grid">
            <div class="five wide computer eight wide tablet column">
                <img id="logo" class="ui fluid image" src="{{ asset('images/logo-bde.png') }}" alt="Logo du bde eXia Strasbourg">
            </div>
            <div class="six wide column computer only ">
                <div id="textlogin" class="text-center">
                    <h1>Bienvenue sur le site du BDE de l'eXia Strasbourg</h1>
                </div>
            </div>
            <div class="five wide computer eight wide tablet column">
                <img id="logoexia" class="ui fluid image" src="{{ asset('images/logoexia.jpg') }}" alt="Logo du bde eXia Strasbourg">
            </div>
            <div class="sixteen wide column tablet only mobile only">
                <div class="text-center">
                    <h1>Bienvenue sur le site du BDE de l'eXia Strasbourg</h1>
                </div>
            </div>
            <hr>
            <div class="sixteen wide column">
                @yield('content')
            </div>
        </div>
    </div>
</body>

    @include('layouts/script')
</body>
</html>