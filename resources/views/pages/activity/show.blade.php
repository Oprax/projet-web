@extends('layouts/app')


@section('content')
    <div>&nbsp;</div>
    <h1 class="ui header">{{ $activity->name }}</h1>
    <div class="ui grid">
        <div class="four wide column">
            <div class="carousel">
                @foreach($activity->photos as $photo)
                <div class="ui card">
                    <div class="image">
                        <img src="{{ $photo->path }}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="two wide column">
            <div>
                <i class="thumbs up icon"></i>
                5 J'aime
            </div>
            <div>
                <i class="comments up icon"></i>
                10 commentaires
            </div>
            <div>
                <button class="ui icon button">
                    <i class="share alternate icon"></i>
                </button>
            </div>
        </div>
        <div class="ten wide column">
            <div class="ui comments">
                <h3 class="ui dividing header">Dernier commentaire de la photo :</h3>
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
    </div>
    <p>
        {{ $activity->description }}
    </p>
    <div class="ui stackable grid">
        <div class="four wide column ui center">
            <i class="thumbs up icon"></i>
            <span data-activity="{{ $activity->id }}">{{ $activity->like }} J'aime</span>
        </div>
        <div class="four wide column ui center">
            <i class="comments up icon"></i>
            {{ $activity->comments->count() }} commentaires
        </div>
        <div class="two wide column ui center">
            <button class="ui icon button">
                <i class="share alternate icon"></i>
            </button>
        </div>
        <div class="four wide column ui center">
            <i class="users icon"></i>
            16 participants
        </div>
    </div>
    @if($activity->comments)
    <div class="ui comments">
        <h3 class="ui dividing header">Commentaire de l'activité :</h3>
        @foreach($activity->comments as $comment)
        <div class="comment">
            <a href="{{ route('user.show', $comment->user_id) }}" class="avatar">
                <img src="{{ $comment->user->avatar }}">
            </a>
            <div class="content">
                <a class="author" href="{{ route('user.show', $comment->user_id) }}">
                    {{ $comment->user->name }}
                    {{ $comment->user->forename }}
                </a>
                <div class="metadata">
                    <span class="date" title="{{ $comment->created_at->format('d/m/Y H:i:s') }}">
                        {{ $comment->created_at->diffForHumans(\Carbon\Carbon::now()) }}
                    </span>
                </div>
                <div class="text">
                    {{ $comment->content }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    <script>
        window.onload = function () {
          $(document).ready(function(){
            $('.carousel').slick({
              autoplay: false,
              dots: true,
              infinite: true,
              arrows: false
            })
          })
        }
    </script>
@endsection