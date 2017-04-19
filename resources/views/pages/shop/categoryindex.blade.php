@extends('layouts/app')

@section('content')

    <style>body{
            padding-top: 10px ;
        }</style>

        <br>

        <h1>{{ $cat_act }}</h1>

        <div class="ui link five cards" style="padding-top: 0; padding-bottom: 0; margin-top: 0; ">
            @foreach($products as $key2 => $product)

                <div class="card">
                    <div class="extra" style="padding-top: 0; padding-bottom: 0; margin-top: 0; ">
                        <a class="header" href="{{ route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]) }}" >{{ str_limit($product->name, 15) }}</a>
                    </div>

                    <div class="image">
                        {{ Html::image("images/shop/test.png") }}
                    </div>
                    <div class="extra" style="padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 0;">
                        {{ $product->price }} €
                    </div>
                </div>
            @endforeach
        </div>


@endsection