@extends('layouts/app')

@section('content')

    <style>

    </style>

    <h1>{{ $product->name }}</h1>
    <p>{{ $product->category }}</p>




    <div class="ui two column grid">
        <div class="column">

                        <div class="three wide column computer only"></div>
                        <div class="carousel sixteen wide phone ten wide computer column ">
                            @foreach($product->pictures as $image)

                                {{ Html::image("$image->url") }}

                            @endforeach
                        </div>
        </div>
        {!! Form::open(['route' => 'shop_add_basket']) !!}

        @php
        if(!empty($sizes) and !empty($colors)){
             $number='three';
        }
        elseif((empty($sizes) and !empty($colors)) OR (!empty($sizes) and empty($colors))){
             $number='two';
        }else{
            $number='one';
        }
        @endphp

        <div class="column">
            <div class="column">
                <p>{{ $product->description }}</p>
            </div>
            <div class="column">
                <br>

                <div class="ui {{ $number }} column grid">

                    @if(!empty($colors))
                        <div class="column">
                            {{  Form::select('colors', $colors, null, array('class' => 'form-control')) }}
                        </div>
                    @endif

                    @if(!empty($sizes))
                        <div class="column">
                                {{  Form::select('sizes', $sizes, null, array('class' => 'form-control')) }}
                        </div>
                    @endif

                    <div class="column">
                        {{  Form::select('quantite', $quantite = array(1,2,3,4,5,6,7,8,9), null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="ui two column grid">
                    <input type="text" class="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="text" class="hidden" name="product_slug" value="{{ $product->slug }}">
                    <input type="text" class="hidden" name="category_name" value="{{ $product->category }}">

                    <h4>Prix : {{ $product->price }} €</h4>
                    <button class="ui button" type="submit" >Ajouter au panier</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

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