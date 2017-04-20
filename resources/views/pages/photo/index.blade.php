@extends('layouts/app')

@section('content')
    <div>&nbsp;</div>
    @if (empty($photos->first()))
        <h1 class="ui divided header">L'activité ne possède pas encore photo</h1>
    @else
        <h1 class="ui divided header">Photos de l'activité : {{$activity->name}}</h1>
    @endif
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
                    @if($photo->comment)
                    <div class="ui comments">
                        <h3 class="ui dividing header">Dernier commentaire :</h3>
                        <div class="comment">
                            <a href="{{ route('user.show', $photo->comment->user_id) }}" class="avatar">
                                <img src="{{ $photo->comment->user->avatar }}">
                            </a>
                            <div class="content">
                                <a class="author" href="{{ route('user.show', $photo->comment->user_id) }}">
                                    {{ $photo->comment->user->name }}
                                    {{ $photo->comment->user->forename }}
                                </a>
                                <div class="metadata">
                                <span class="date" title="{{ $photo->comment->created_at->format('d/m/Y H:i:s') }}">
                                    {{ $photo->comment->created_at->diffForHumans(\Carbon\Carbon::now()) }}
                                </span>
                                </div>
                                <div class="text">
                                    {{ $photo->comment->content }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="extra content">
                    <span class="right floated">
                        <like likes="{{ $photo->likes->count() }}" likable-id="{{ $photo->id }}" user-id="{{ Auth::user()->id }}" type="Photo"></like>
                    </span>
                    <i class="comments up icon"></i>
                    {{ $photo->comments->count() }} commentaires
                </div>
                {!! Form::open(['action' => ['PhotoController@destroy',$activity->id, $photo->id], 'method' => 'DELETE', 'class' => 'ui big form error', 'files' => true]) !!}

                    <label for="pics" class="ui red        attached icon button" onclick="document.getElementById('pic-submit').click();">
                        <i class="erase icon"></i>
                        Supprimer la photo</label>
                    <input id="pic-submit" type="submit" hidden>
                    @if ($errors->has('pics'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('pics') }}</strong>
                        </div>
                    @endif
                {!! Form::close() !!}
            </div>
        </div>
    @endforeach

    </div>
@endsection
