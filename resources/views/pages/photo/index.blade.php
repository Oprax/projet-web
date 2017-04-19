@extends('layouts/app')

@section('content')
    <div>&nbsp;</div>
    <div class="ui cards">
    @foreach($photos as $photo)
        <div class="ui link card">
            <div class="content">
                <div class="right floated meta" title="{{ $photo->created_at }}">>
                    {{ \Carbon\Carbon::parse($photo->created_at)->diffForHumans(\Carbon\Carbon::now()) }}
                </div>
                <img src="{{ $photo->user->avatar }}" class="ui avatar image">
                <a href="{{ route('user.show', $photo->user_id) }}">{{ $photo->user->forename }} {{ $photo->user->name }}</a>
            </div>
            <a class="image" href="{{ route('activity.photos.show', [$activity->id, $photo->id]) }}">
                <img src="{{ $photo->path }}">
            </a>
            <div class="content">
                <div class="description">
                    <div class="ui comments">
                        <h3 class="ui dividing header">Dernier commentaire :</h3>
                        <div class="comment">
                            <a href="#" class="avatar">
                                <img src="https://lorempixel.com/150/150/people/">
                            </a>
                            <div class="content">
                                <a class="author">Matt</a>
                                <div class="metadata">
                                    <span class="date">Today at 5:42PM</span>
                                </div>
                                <div class="text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci atque cupiditate debitis enim expedita facere illo illum natus odio porro, quia quibusdam quo, quos repudiandae temporibus tenetur veniam vero?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="extra content">
                    <span class="right floated">
                        <i class="thumbs up icon"></i>
                        {{ $photo->like }} J'aime
                    </span>
                    <i class="comments up icon"></i>
                    3 commentaires
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
