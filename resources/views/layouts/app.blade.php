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
    <div class="ui sidebar inverted vertical menu">
        <div class="item">
            <img src="{{ asset('images/logo-bde.png') }}" alt="Logo du bde eXia Strasbourg">
        </div>
        <div class="item">
            <div class="text">Parc Club des Tanneries,<br>
            2 Allée des Foulons,<br>
            67380 Strasbourg Lingolsheim<br>
            03 88 10 35 60<br>
            </div>
        </div>
        <div class="hidden-md hidden-lg hidden-sm">
            <div class="item">
                <a href="{{route('home')}}"></a> Accueil
            </div>
            <div class="item">
                <a href="{{route('activity.index')}}"></a> Activités
            </div>
            <div class="item">
                <a href="{{ route('shop_home') }}"> Boutique</a>
            </div>
            <div class="item">
                Mon Compte
            </div>
        </div>
        @if (Request::is('shop*'))
            @include('layouts/side/left-bar-shop')
        @else
            @include('layouts/side/left-bar')
        @endif

    </div>

    <div class="pushed">
        <div class="ui massive fixed inverted menu" id="barremenu">
            <div class="ui container">
                <a href="{{route('home')}}" class="header item">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a id="MenuButtonSideBar" class="item"><i class="bars icon"></i></a>
                <a id="Accueil" href="{{ route('home') }}" class="item hidden-xs">Accueil</a>
                <a id="Activités" href="{{ route('activity.index') }}" class="item hidden-xs">Activités</a>
                <a id="Boutique" href="{{ route('shop_home') }}" class="item hidden-xs">Boutique</a>
                <div class="right menu hidden-xs">
                    <div class="ui simple dropdown item" style="padding-top: 0px; padding-bottom: 0px;">
                        <img style="height:25px; width: 25px; margin-right: 5px" id="avatar-navbar" class="ui mini circular image" src="{{asset(\Illuminate\Support\Facades\Auth::user()->avatar)}}">
                        {{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->forename}}<i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="{{route('user.show', ['user' => \Illuminate\Support\Facades\Auth::id()])}}">Mon compte</a>
                            <a class="item" href="{{route('user.edit', ['user' => \Illuminate\Support\Facades\Auth::id()])}}">Editer mon compte</a>
                            <a class="item" href="{{route('logout')}}">Déconnexion</a>
                            <div class="ui divider"></div>
                            <a class="item" href="{{route('user.index')}}">Gestion des utilisateurs</a>
                        </div>
                    </div>
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
        <div class="container">
            <div class="ui grid">
                @if(!(Request::is('/') || Request::is('/user')))
                    <div class="twelve wide column">
                        @yield('content')
                    </div>

                    <div class="four wide column">
                        @if (Request::is('shop*'))
                            @include('layouts/side/right-bar-shop')
                        @else
                            @include('layouts/side/right-bar')
                        @endif
                    </div>
                @else
                    <div class="sixteen wide column">
                        @yield('content')
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('layouts/script')
</body>
</html>