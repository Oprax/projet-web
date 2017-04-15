@extends('layouts/app')

@section('content')

    <style>body{
            padding-top: 10px ;
        }</style>

    @foreach($categories as $key => $category)
        <br>

        {{ $category->name }}
        <div class="ui five cards" style="padding-top: 0; padding-bottom: 0; margin-top: 0; ">
            @foreach($products[$key] as $key2 => $product)

                <div class="card">
                    <div class="extra" style="padding-top: 0; padding-bottom: 0; margin-top: 0; ">
                        <a class="header">{{ str_limit($product->name, 15) }}</a>
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
    @endforeach


@endsection