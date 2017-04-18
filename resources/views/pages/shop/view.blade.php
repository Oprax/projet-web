@extends('layouts/app')

@section('content')

    <style>body{
        }</style>

    <h1>{{ $product->name }}</h1>
    <p>{{ $product->category }}</p>

    <div class="ui two column grid">
        <div class="column">
            <div class="image">
                {{ Html::image("images/shop/test.png") }}
            </div>
        </div>
        <div class="column">
            <div class="column">
                <p>{{ $product->description }}</p>
            </div>
            <div class="column">
                <br>
                <div class="ui three column grid">
                    <div class="column">
                        couleur
                    </div>
                    <div class="column">
                        taille
                    </div>
                    <div class="column">
                        <h4>Prix : {{ $product->price }} €</h4>
                    </div>
                </div>
                <div class="ui one column grid">
                    <div class="column"><a href="#"> Ajouter au panier </a></div>
                </div>
            </div>
        </div>
    </div>

    <br> <br>
    <h3>Commentaires</h3>
        <div class="ui comments">

            @foreach($comments as $comment)
            <div class="comment">
                <a class="avatar">
                    {{ Html::image("images/shop/test.png") }}
                </a>
                <div class="content">
                    <a class="author">{{ $comment->firstname.' '.$comment->lastname}}</a>
                    <div class="metadata">
                        <div class="date">1 day ago</div>
                    </div>
                    <div class="text">
                        <p>{{ $comment->content }}</p>
                    </div>
                </div>
            </div>
            @endforeach


            {!! Form::open(['route' => 'shop_store_comment']) !!}

            <form class="ui form">
                <div class="field">
                    <br>
                    <input type="text" class="hidden" name="product_id" value="{{ $product->id }}">
                    <textarea type="text" name="content" placeholder="Ajouter un commentaire" class="form-control"></textarea>
                </div>
                <br>
                <button class="ui button" type="submit">Envoyer</button>
            </form>


                {!! Form::close() !!}
        </div>

@endsection