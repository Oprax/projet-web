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
    <div class="ui sidebar inverted vertical menu">
        <div class="item">
            <img src="{{ asset('images/logo-bde.png') }}" alt="Logo du bde eXia Strasbourg">
        </div>
        <div class="item">
            <div class="text">Parc Club des Tanneries,
            2 Allée des Foulons,
            67380 Strasbourg Lingolsheim
            03 88 10 35 60
            </div>
        </div>
        <div class="hidden-md hidden-lg hidden-sm">
            <div class="item">
                Accueil
            </div>
            <div class="item">
                Activités
            </div>
            <div class="item">
                Boutique
            </div>
            <div class="item">
                Mon Compte
            </div>
        </div>

    </div>

    <div class="pushed">
        <div class="ui massive fixed inverted menu">
            <div class="ui container">
                <a href="#" class="header item">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a id="MenuButtonSideBar" class="item"><i class="bars icon"></i></a>
                <a href="#" class="item hidden-xs">Accueil</a>
                <a href="#" class="item hidden-xs">Activités</a>
                <a href="#" class="item hidden-xs">Boutique</a>
                <div class="right menu hidden-xs">
                    <a href="#" class="item">Mon Compte</a>
                </div>
            </div>
        </div>

        <div class="ui container">
            <div class="following bar">
                <div class="ui large inverted secondary network menu">
                    <div class="ui text menu item">
                        <div class="header item">BDE eXia</div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Site content !-->

    </div>
</body>

    @include('layouts/script')
</body>
</html>