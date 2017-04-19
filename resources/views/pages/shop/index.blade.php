@extends('layouts/app')

@section('content')

    <style>body{
            padding-top: 10px ;
        }</style>

    @foreach($categories as $key => $category)
        <br>
        @php($number = 0)

        <a href="{{ route('shop_products_categories', ['category' => $category->name]) }}"> {{ $category->name }}</a>
        <div class="ui link five cards" style="padding-top: 0; padding-bottom: 0; margin-top: 0; ">
            @foreach($products as $key2 => $product)

                @if($product->category->name == $category->name AND $number < 5)
                    @php($number++)
                <div class="card">
                    <div class="extra" style="padding-top: 0; padding-bottom: 0; margin-top: 0; ">
                        <a class="header" href="{{ route('shop_product', ['category' => $category->name, 'product' => $product->slug]) }}" >{{ str_limit($product->name, 15) }}</a>
                    </div>

                    <div class="image">
                        {{ Html::image("images/shop/test.png") }}
                    </div>
                    <div class="extra" style="padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 0;">
                        {{ $product->price }} €
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @endforeach


@endsection