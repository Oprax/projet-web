@extends('layouts/app')

@section('content')

    @foreach($categories as $key => $category)
        @php($number = 0)

        <a id="shoproduit" href="{{ route('shop_products_categories', ['category' => $category->name]) }}"><h3> {{ $category->name }}</h3></a>
        <div class="ui link five cards">
            @foreach($products as $key2 => $product)

                @if($product->category->name == $category->name AND $number < 5)
                    @php($number++)
                <div class="card">
                    <div id="extra" class="extra">
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
                    <div id="extra1" class="extra">
                        {{ $product->price }} €
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @endforeach


@endsection