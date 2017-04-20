@extends('layouts/app')

@section('content')

        <h3 id="catact">{{ $cat_act }}</h3>

        <div class="ui link five stackable cards" >
            @foreach($products as $key2 => $product)

                <div class="card">
                    <div class="extra">
                        <a class="header" href="{{ route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]) }}" ><h4>{{ str_limit($product->name, 15) }}</h4></a>
                    </div>

                    <div class="image">
                        @if(isset($product->pictures[0]))
                            <a href="{{ route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]) }}" ><img class="ui image" src="{{ asset($product->pictures[0]->url) }}" alt=""></a>
                        @else
                            <a href="{{ route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]) }}" ><img class="ui image" src="{{ asset('images/shop/image_default.png') }}" alt=""></a>
                        @endif
                    </div>
                    <div class="extra">
                        {{ $product->price }} €
                    </div>
                </div>
            @endforeach
        </div>
@endsection