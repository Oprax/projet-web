@extends('layouts/app')


@section('content')
    <div>&nbsp;</div>
    <h1 class="ui header">Activity 5</h1>
    <div class="ui grid">
        <div class="four wide column">
            <div class="carousel">
                <div class="ui card">
                    <div class="image">
                        <img src="https://lorempixel.com/200/200/sports/">
                    </div>
                </div>
                <div class="ui card">
                    <div class="image">
                        <img src="https://lorempixel.com/200/200/sports/">
                    </div>
                </div>
                <div class="ui card">
                    <div class="image">
                        <img src="https://lorempixel.com/200/200/sports/">
                    </div>
                </div>
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
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aperiam asperiores consequuntur, dolore dolorum eveniet fugiat id ipsam iste iusto minima modi nemo nobis, officia, quas quos reprehenderit sint tempora?
    </p>
    <div class="ui stackable grid">
        <div class="four wide column ui center">
            <i class="thumbs up icon"></i>
            5 J'aime
        </div>
        <div class="four wide column ui center">
            <i class="comments up icon"></i>
            10 commentaires
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
    <div class="ui comments">
        <h3 class="ui dividing header">Commentaire de l'activité :</h3>
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