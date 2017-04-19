@extends('layouts/app')


@section('content')
    <div>&nbsp;</div>
    <h1 class="ui header">{{ $activity->name }}</h1>
    <div class="ui grid">
        <div class="four wide column">
            <div class="carousel">
                @foreach($activity->photos as $photo)
                <a class="ui card" href="{{ route('activity.photos.show', [$activity, $photo]) }}" data-photo="{{ $photo->id }}">
                    <div class="image">
                        <img src="{{ $photo->path }}">
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="twelve wide column" id="app">
            <comments type="Photo" fid="{{ $activity->photos->last()->id }}"></comments>
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
            $('.carousel').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
              var fid = $('.slick-active').attr('data-photo');
              $('#app').html('<comments type="Photo" fid="' + fid + '"></comments>')
              const app = new Vue({
                el: '#app',
                productionTip: false
              });
            })
          })
        }
    </script>
@endsection