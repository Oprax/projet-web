@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="ui equal width big form {{ $errors ? ' error' : '' }}" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="fields">
                            <div class="required field{{ $errors->has('name') ? ' error' : '' }}">

                                <label for="name">Nom</label>

                                <div class="ui left icon input">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    <i class="user icon"></i>
                                </div>
                                @if ($errors->has('name'))
                                    <div class="ui error message">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                @endif
                            </div>
                            <div class="required field{{ $errors->has('name') ? ' error' : '' }}">
                                <label for="forename">Prénom</label>

                                <div class="ui left icon input">
                                    <input id="forename" type="text" class="form-control" name="forename" value="{{ old('name') }}" required autofocus>
                                    <i class="user icon"></i>
                                </div>
                                @if ($errors->has('name'))
                                    <div class="ui error message">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="required field{{ $errors->has('email') ? ' error' : '' }}">
                            <label for="email">E-Mail</label>
                            <div class="ui left icon input">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
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
                                <input id="password" type="password" class="form-control" name="password" required>
                                <i class="lock icon"></i>
                            </div>
                            @if ($errors->has('password'))
                                <div class="ui error message">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                            @endif
                        </div>

                        <div class="required field">
                            <label for="password-confirm" >Confirmation du mot de passe</label>

                            <div class="ui left icon input">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <i class="repeat icon"></i>
                            </div>
                        </div>

                        <div class="required field">
                            <label for="status">Status</label>
                            <select class="ui fluid dropdown" name="status" id="status" required>
                                <option value="">Status</option>
                                @foreach ($Status as $status)
                                <option value="{{ $status->name }}">{{ $status->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="required field">
                            <label for="birthday">Date de naissance</label>
                            <div class="ui calendar" id="calendarYearFirst">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" name="birthday" placeholder="Date/Time">
                                </div>
                            </div>

                        </div>

                        <div class="field">
                                <button type="submit" class="huge ui icon button">
                                    <i class="sign in icon"></i> S'inscrire
                                </button>
                        </div>
                        <div class="field">
                            <a href="{{route('login')}}">Se connecter</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
