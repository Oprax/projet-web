@extends('layouts/app')

@section('content')

    <div>&nbsp;</div>
    <div id="app">
        <div id="segmentA" class="ui segment">
            <h1 class="ui header">{{ $title }}</h1>
            @foreach($activities as $act)
                @include('layouts/activity')
            @endforeach
        </div>
    </div>

@endsection
