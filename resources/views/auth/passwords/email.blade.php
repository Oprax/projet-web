@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Réinitialiser le mot de passe</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="ui big form {{$errors ? ' error' : ''}}" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('email') ? ' error' : '' }}">
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

                        <div class="field">
                            <button type="submit" class="huge ui icon button">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
