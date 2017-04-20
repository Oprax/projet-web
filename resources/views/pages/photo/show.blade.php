@extends('layouts/app')

@section('content')
    <div>&nbsp;</div>
    <div class="ui rounded image">
        <img src="{{ $photo->path }}">
    </div>
    <div>&nbsp;</div>
    <div class="ui stackable grid">
        <div class="four wide column ui center" id="app">
            <like likes="{{ $photo->likes->count() }}" likable-id="{{ $photo->id }}" user-id="{{ Auth::user()->id }}" type="Photo"></like>
        </div>
        <div class="four wide column ui center">
            <i class="comments up icon"></i>
            {{ $photo->comments->count() }} commentaires
        </div>
        <div class="four column ui center">
            <button class="ui icon button">
                <i class="share alternate icon"></i>
            </button>
        </div>
        <div class="four wide column">
            {!! Form::open(['action' => ['PhotoController@destroy',$activity->id, $photo->id], 'method' => 'DELETE', 'class' => 'ui big form error', 'files' => true]) !!}

            <button for="pics" class="ui red icon button" onclick="document.getElementById('pic-submit').click();">
                <i class="erase icon"></i>
                Supprimer la photo</button>
            <input id="pic-submit" type="submit" hidden>
            @if ($errors->has('pics'))
                <div class="ui error message">
                    <strong>{{ $errors->first('pics') }}</strong>
                </div>
            @endif
            {!! Form::close() !!}
        </div>
    </div>
    @if($photo->comments)
        <div class="ui comments">
            <h3 class="ui dividing header">Commentaire de l'activité :</h3>
            @foreach($photo->comments as $comment)
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
    <form action="{{ route('comments.store') }}" method="post" class="ui form">
        @if($errors)
            <div class="ui error message">
                <div class="header">
                    Une erreur est survenue !
                </div>
                <ul class="list">
                    @foreach($errors as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="commentable_id" value="{{ $photo->id }}">
        <input type="hidden" name="commentable_type" value="Photo">
        <div class="field">
            <label for="content">Votre commentaire : </label>
            <textarea id="content" name="content"></textarea>
        </div>
        <div class="field">
            <button type="submit" class="ui button primary">
                Poster
            </button>
        </div>
    </form>
@endsection