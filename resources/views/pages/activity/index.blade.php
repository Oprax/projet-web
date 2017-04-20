@extends('layouts/app')

@section('content')

    <div>&nbsp;</div>

    @if(Auth::user()->isCesi())
        <a class="ui labeled icon primary button">
            <i class="cloud download icon"></i>
            Télécharger les photos
        </a>
    @endif
    <div id="segmentF" class="ui segment">
        <h1 id="Activitésvenir" class="ui header"><a href="{{ route('activity.future') }}">Activité à venir</a></h1>
        @foreach($act_fut as $act)
            @include('layouts/activity')
        @endforeach
    </div>
    <div id="segmentC" class="ui segment">
        <h1 id="Activitéscours" class="ui header"><a href="{{ route('activity.current') }}">Activité en cours</a></h1>
        @foreach($act_curr as $act)
            @include('layouts/activity')
        @endforeach
    </div>
    <div id="segmentP" class="ui segment">
        <h1 id="Activitéspassé" class="ui header"><a href="{{ route('activity.past') }}">Activité passés</a></h1>
        @foreach($act_past as $act)
            @include('layouts/activity')
        @endforeach
    </div>
@endsection
