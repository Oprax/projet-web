@extends('layouts/app')

@section('content')


    <h1 id="produitachat">{{ $product->name}}</h1>
    <p id="catproduit">{{ $product->category }}</p>




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
                <p id="descriptionprod">{{ $product->description }}</p>
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
                    <button class="ui green icon button" type="submit" ><i class="add icon"></i> Ajouter au panier</button>
                </div>
                {!! Form::close() !!}
                @if(\Illuminate\Support\Facades\Auth::user()->isCesi())
                    <br>
                    <br>
                    <div class="ui two column grid">
                        {!! Form::open(['route' => ['shop_getupdate_product', $product->category, $product->name], 'method' => 'GET']) !!}
                            <input type="text" class="hidden" name="product_id" value="{{ $product->id }}">

                        <button class="ui orange icon button" type="submit"><i class="edit icon"></i>Éditer l'article</button>
                        {!! Form::close() !!}

                        {!! Form::open(['route' => ['shop_delete_product', $product->category_id, $product], 'method' => 'DELETE']) !!}
                            <input type="text" class="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="ui red icon button" type="submit"><i class="delete icon"></i>Supprimer l'article</button>
                        {!! Form::close() !!}

                    </div>
                @endif
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
                    @if(\Illuminate\Support\Facades\Auth::user()->isCesi())

                            {!! Form::open(['route' => ['shop_delete_comment', $comment], 'method' => 'DELETE']) !!}
                            <input type="text" class="hidden" name="category_name" value="{{ $product->category }}">
                            <input type="text" class="hidden" name="product_slug" value="{{ $product->slug }}">

                            <button class="ui red icon button" type="submit"><i class="delete icon"></i>Supprimer le commentaire</button>
                            {!! Form::close() !!}

                    @endif
                </div>
            </div>
            @endforeach


            {!! Form::open(['route' => 'shop_store_comment']) !!}

            <form class="ui form">
                <div class="field">
                    <br>
                    <input type="text" class="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="text" class="hidden" name="category_name" value="{{ $product->category }}">
                    <input type="text" class="hidden" name="product_slug" value="{{ $product->slug }}">

                    <textarea type="text" name="content" placeholder="Ajouter un commentaire" class="form-control"></textarea>
                </div>
                <br>
                <button class="ui button" type="submit">Envoyer</button>
            </form>


                {!! Form::close() !!}


        </div>

@endsection