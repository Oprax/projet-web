@extends('layouts/app')

@section('content')

    @foreach($categories as $key => $category)
        @php($number = 0)

        <a id="shoproduit" href="{{ route('shop_products_categories', ['category' => $category->name]) }}"><h3> {{ $category->name }}</h3></a>

        <br>

        <div class="ui link five stackable cards">
            @foreach($products as $key2 => $product)

                @if($product->category->name == $category->name AND $number < 5)
                    @php($number++)
                <div class="card">
                    <div id="extra" class="extra" >
                        <a class="header" href="{{ route('shop_product', ['category' => $category->name, 'product' => $product->slug]) }}" ><h4>{{ str_limit($product->name, 15) }}</h4></a>
                    </div>
<!--Afficher premiere image dans index -->
                    <div class="image">
                        @if(isset($product->pictures[0]))
                            <a href="{{ route('shop_product', ['category' => $category->name, 'product' => $product->slug]) }}" ><img class="ui image" src="{{ asset($product->pictures[0]->url) }}" alt=""></a>
                        @else
                            <a href="{{ route('shop_product', ['category' => $category->name, 'product' => $product->slug]) }}" ><img class="ui image" src="{{ asset('images/shop/image_default.png') }}" alt=""></a>
                        @endif
                    </div>
                    <div id="extra1" class="extra" >
                        <h5>{{ $product->price }} €</h5>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @endforeach


@endsection