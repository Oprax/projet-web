@extends('layouts/app')

@section('content')

    <style>body{
            padding-top: 10px ;
        }</style>

    @foreach($categories as $key => $category)
        <br>
        @php($number = 0)

        <a id="test" href="{{ route('shop_products_categories', ['category' => $category->name]) }}"><h3> {{ $category->name }}</h3></a>
        <div class="ui link five cards" style="padding-top: 0; padding-bottom: 0; margin-top: 0; ">
            @foreach($products as $key2 => $product)

                @if($product->category->name == $category->name AND $number < 5)
                    @php($number++)
                <div class="card">
                    <div id="extra" class="extra" style="padding-top: 0; padding-bottom: 0; margin-top: 0; ">
                        <a class="header" href="{{ route('shop_product', ['category' => $category->name, 'product' => $product->slug]) }}" ><h5>{{ str_limit($product->name, 15) }}</h5></a>
                    </div>
<!--Afficher premiere image dans index -->
                    <div class="image">
                        @if(isset($product->pictures[0]))
                            {{ Html::image($product->pictures[0]->url) }}
                        @else
                            {{ Html::image('images/shop/image_default.png') }}
                        @endif
                    </div>
                    <div id="extra1" class="extra" style="padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 0;">
                        {{ $product->price }} €
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @endforeach


@endsection