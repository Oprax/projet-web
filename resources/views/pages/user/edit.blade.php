@extends('layouts/app')

@section('content')
    <div>&nbsp;</div>
    <div class="ui grid">
        <div class="three wide computer only column"></div>
        <div class="fourteen wide tablet six wide computer column">
            <img src="{{asset($User->avatar)}}" alt="Avatar de {{$User->name}} {{$User->forename}}">
        </div>
        @if($User->is_valid)
        <div id="compteV" class="ui four wide computer column center aligned page grid">
            <i class="ui huge green checkmark icon"></i>
            <h3>Compte validé</h3>
        </div>
        @else
        <div class="ui four wide computer column center aligned page grid">
            <i class="ui huge red warning sign icon"></i>
            <h3>Compte non-validé</h3>
        </div>
        @endif
    </div>
    <div id="gridedit" class="ui stackable grid">

        <div class="three wide computer only column"></div>
        <div class="sixteen wide tablet ten wide computer column">
            <form class="ui big form {{$errors ? ' error' : ''}}"  role="form" method="POST" action="{{ route('user.store') }}">
                {{csrf_field()}}
                <input type="hidden" name="user" value="{{$User->id}}">
                <div class="fields">
                    <div class="field">
                        <label for="avatar">Changer d'avatar</label>
                        <input type="file" name="avatar">
                        @if ($errors->has('avatar'))
                            <div class="ui error message">
                                <strong>{{ $errors->first('avatar') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="fields">
                    <div class="required field">
                        <label for="name">Nom</label>
                        <input type="text" name="name" value="{{ old('name') ? old('name') : $User->name }}" required>
                        @if ($errors->has('name'))
                            <div class="ui error message">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="required field">
                        <label for="forename">Prénom</label>
                        <input type="text" name="forename" value="{{old('forename') ? old('forename') : $User->forename}}" required>
                        @if ($errors->has('forename'))
                            <div class="ui error message">
                                <strong>{{ $errors->first('forename') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="required field">
                    <label for="birthday">Date de naissance</label>
                    <div class="ui calendar" id="calendarYearFirst">
                        <div class="ui input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" name="birthday" placeholder="Date/Time" value="{{Carbon\Carbon::parse($User->birthday)->format('Y-m-d')}}">
                        </div>
                    </div>
                    @if ($errors->has('birthday'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('birthday') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{old('email') ? old('email') : $User->email}}" required>
                    @if ($errors->has('email'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="field">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password">
                    @if ($errors->has('password'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="field">
                    <label for="password-confirm">Confirmation du mot de passe</label>
                    <input type="password" name="password-confirm">
                    @if ($errors->has('password-confirm'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('password-confirm') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="required field">
                    <label for="status">Status</label>
                    <select name="status" class="ui dropdown">
                        <option disabled="" value="">Status</option>
                        @foreach ($Status as $status)
                            <option {{$User->status->id === $status->id ? 'selected="selected"' : ''}}>{{$status->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('status') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="required  field">
                    <label for="role">Role</label>
                    <select name="role" class="ui dropdown">
                        <option disabled="" value="">Role</option>
                        @foreach ($Role as $role)
                            <option {{$User->role->id === $role->id ? 'selected="selected"' : ''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('role') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="required field">
                    <label for="association">Association</label>
                    <select name="association" class="ui dropdown">
                        <option disabled="" value="">Association</option>
                        @foreach($Association as $assoc)
                            <option {{$User->association->id === $assoc->id ? 'selected="selected"' : ''}}>{{$assoc->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('association'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('association') }}</strong>
                        </div>
                    @endif
                </div>
                <button class="ui button" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection