@extends('layouts/app')

@section('content')
<div>&nbsp;</div>
<div class="ui stackable grid">
     <div class="sixteen wide mobile six wide computer column">
         <img class="ui centered medium circular image" src="{{asset($User->avatar)}}" alt="">
     </div>
    <div class="sixteen wide mobile five wide computer column">
        <h1>{{$User->name}} {{$User->forename}}</h1>
        <h2>{{$User->status->name}}</h2>
        <div class="ui list">
            <div class="item">
                <i class="student icon"></i>
                <div class="content">
                    {{$User->role->name}}
                </div>
            </div>
            <div class="item">
                <i class="mail icon"></i>
                <div class="content">
                    {{$User->email}}
                </div>
            </div>
            <div class="item">
                <i class="birthday icon"></i>
                <div class="content">
                    {{Carbon\Carbon::parse($User->birthday)->format('d/m/Y')}}
                </div>
            </div>
            <div class="item">
                <i class="users icon"></i>
                <div class="content">
                    {{$User->association}}
                </div>
            </div>

        </div>

    </div>
</div>


@endsection