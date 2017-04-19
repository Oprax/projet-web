@extends('layouts/app')

@section('content')

    <div>&nbsp;</div>


    <div class="ui segment">
        <h1 class="ui header">Activité en cours</h1>
        <div class="ui segment">
            <div class="ui stackable grid">
                <div class="four wide column">
                    <div class="ui card">
                        <div class="image">
                            <img src="https://lorempixel.com/400/400/sports/">
                        </div>
                    </div>
                </div>
                <div class="twelve wide column">
                    <h2 class="ui header">Activité Sport !</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis quod, similique. Accusantium, dolore doloribus est eum ex fugiat fugit inventore labore laudantium modi nisi perspiciatis quo sit sunt ut voluptatum.
                    </p>
                    <div class="ui stackable grid">
                        <div class="eight wide column">
                            <i class="calendar icon"></i>
                            {{ (new DateTime())->format('d/m/Y H:i:s') }}
                        </div>
                        <div class="eight wide column">
                            <i class="map signs icon"></i>
                            {{ 'Lingolsheim' }}
                        </div>
                    </div>
                    <div class="ui grid">
                        <div class="four wide column ui center">
                            <i class="thumbs up icon"></i>
                            5 J'aime
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
            </div>
        </div>
    </div>

@endsection
