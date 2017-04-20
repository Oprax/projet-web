@extends('layouts/app')

@section('content')

        <h3 id="catact">{{ $cat_act }}</h3>

        <div class="ui link five stackable cards" >
            @foreach($products as $key2 => $product)

                <div class="card">
                    <div class="extra" style="padding-top: 0; padding-bottom: 0; margin-top: 0; ">
                        <a class="header" href="{{ route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]) }}" ><h4>{{ str_limit($product->name, 15) }}</h4></a>
                    </div>

                    <div class="image">
                        @if(isset($product->pictures[0]))
                            {{ Html::image($product->pictures[0]->url) }}
                        @else
                            {{ Html::image('images/shop/image_default.png') }}
                        @endif
                    </div>
                    <div class="extra" style="padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 0;">
                        {{ $product->price }} €
                    </div>
                </div>
            @endforeach
        </div>


@endsection