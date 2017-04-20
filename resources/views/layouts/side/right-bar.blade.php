<div class="text">

    <div id="Boutiqueside" class="ui segment">
        <div class="ui centered aligned header">
            <h2>Boutique</h2>
        </div>
        @foreach ($Products as $product)
        <div id="productside" class="ui segment">
            <div class="ui centered aligned header">
                {{ $product->name }}
            </div>
            <div class="ui grid">
                <img class="ui  centered medium image" src="@if(isset($product->pictures[0]))
                {{ asset($product->pictures[0]->url) }}
                @else
                {{'images/shop/image_default.png' }}
                @endif">
            </div>
            <div class="ui center aligned grid">
                <div id="buyproduct" class="ui circular segment">
                    <h4 class="ui header">
                        Acheter maintenant !
                        <div class="sub header">{{$product->price}}€</div>
                    </h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
