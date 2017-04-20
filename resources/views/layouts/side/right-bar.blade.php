<div class="text">

    <div id="Boutiqueside" class="ui segment">
        <div class="ui centered aligned header">
            <h2>Boutique</h2>
        </div>
        @foreach ($Products as $product)
        <div id="productside" class="ui segment">
            <div class="ui centered aligned header">
                <a href="{{route('shop_product', [$product->category_id, $product->slug])}}">{{ $product->name }}</a>
            </div>
            <div class="ui grid">
                <a href="{{route('shop_product', [$product->category_id, $product->slug])}}"><img class="ui  centered medium image" src="@if(isset($product->pictures[0]))
                {{ asset($product->pictures[0]->url) }}
                @else
                {{'images/shop/image_default.png' }}
                @endif"></a>
            </div>
            <div class="ui center aligned grid">
                <div id="buyproduct" class="ui circular segment">
                    <a href="{{route('shop_product', [$product->category_id, $product->slug])}}">
                    <h4 class="ui header">
                        Acheter maintenant !
                        <div class="sub header">{{$product->price}}€</div>
                    </h4></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
