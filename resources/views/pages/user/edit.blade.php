@extends('layouts/app')

@section('content')
    <div>&nbsp;</div>
    <div class="ui grid">
        <div class="three wide computer only column"></div>
        <div class="fourteen wide tablet six wide computer column">
            <img src="{{asset($User->avatar)}}" alt="Avatar de {{$User->name}} {{$User->forename}}">
        </div>
        @if($User->is_valid)
        <div class="ui four wide computer column center aligned page grid">
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
    <div class="ui stackable grid">

        <div class="three wide computer only column"></div>
        <div class="sixteen wide tablet ten wide computer column">
            <form class="ui big form {{$errors ? ' error' : ''}}"  role="form" method="POST" action="{{ route('user.store') }}">
                <div class="fields">

                    <div class="field">
                        <label for="avatar">Changer d'avatar</label>
                        <input type="file" name="avatar">
                    </div>
                </div>
                <div class="fields">
                    <div class="required field">
                        <label for="name">Nom</label>
                        <input type="text" name="name" value="{{ old('name') ? old('name') : $User->name }}" required>
                    </div>
                    <div class="required field">
                        <label for="forename">Prénom</label>
                        <input type="text" name="forename" value="{{old('forename') ? old('forename') : $User->forename}}" required>
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

                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{old('email') ? old('email') : $User->email}}" required>
                </div>
                <div class="field">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password">
                </div>
                <div class="required field">
                    <label for="password-confirm">Confirmation du mot de passe</label>
                    <input type="password" name="password">
                </div>
                <div class="required field">
                    <label for="status">Status</label>
                    <select name="status" class="ui dropdown">
                        <option disabled="" value="">Status</option>
                        @foreach ($Status as $status)
                            <option selected="{{$User->status->id === $status->id ? 'selected' : ''}}" value="$status->id">{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="required  field">
                    <label for="role">Role</label>
                    <select name="role" class="ui dropdown">
                        <option disabled="" value="">Role</option>
                        @foreach ($Role as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="required field">
                    <label for="association">Association</label>
                    <select name="role" class="ui dropdown">
                        <option disabled="" value="">Association</option>
                        @foreach($Association as $assoc)
                            <option value="{{$assoc->id}}">{{$assoc->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="ui button" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection