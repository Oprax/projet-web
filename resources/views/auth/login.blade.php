@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="eight wide column">
        <div class="panel panel-default">
            <div class="panel-heading">Se connecter</div>
            <div class="panel-body">
                <form class="ui big form {{$errors ? ' error' : ''}}"  role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="required field{{ $errors->has('email') ? ' error' : '' }}">
                        <label for="email">E-Mail</label>

                        <div class="ui left icon input">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            <i class="mail icon"></i>
                        </div>
                        @if ($errors->has('email'))
                            <div class="ui error message">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="required field{{ $errors->has('password') ? ' error' : '' }}">
                        <label for="password">Mot de passe</label>

                        <div class="ui left icon input">
                            <input id="password" type="password" name="password" required>
                            <i class="lock icon"></i>
                        </div>
                        @if ($errors->has('password'))
                            <div class="ui error message">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="field">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label>Se souvenir de moi</label>
                        </div>
                    </div>

                    <div class="field">
                        <button type="submit" class="huge ui icon button">
                            <i class="icon sign in"></i> Se connecter
                        </button>
                    </div>
                    <div class="fields">
                        <div class="field">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Mot de passe oublié ?
                            </a>
                        </div>
                        <div class="field">
                            <a class="btn btn-link" href="{{ route('register') }}">
                                S'inscrire
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
