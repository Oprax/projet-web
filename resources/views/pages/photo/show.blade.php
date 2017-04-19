@extends('layouts/app')

@section('content')
    <div>&nbsp;</div>
    <div class="ui rounded image">
        <img src="{{ $photo->path }}">
    </div>
    <div class="ui stackable grid">
        <div class="four wide column ui center">
            <i class="thumbs up icon"></i>
            {{ $photo->like }} J'aime
        </div>
        <div class="six wide column ui center">
            <i class="comments up icon"></i>
            10 commentaires
        </div>
        <div class="four column ui center">
            <button class="ui icon button">
                <i class="share alternate icon"></i>
            </button>
        </div>
    </div>
    <div id="app">
        <comments type="Photo" fid="{{ $photo->id }}"></comments>
    </div>
@endsection