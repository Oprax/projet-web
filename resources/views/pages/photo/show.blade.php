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
@endsection