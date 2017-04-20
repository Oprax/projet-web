

    <div class="text">

        <div class="ui segment">
            <div class="ui centered aligned header">
                <h2><a class="header" href="{{ route('shop_basket') }}" >Panier</a></h2>
            </div>
            @php($nbindex = count($baskets))
            @php($totalttc = array())
        @if(isset($productsbasket))
                @php($index = 0)
                @foreach($productsbasket as $key => $product)
                    <hr>
                    <div class="ui grid two column">
                        <div class="content" >
                            @if(isset($product->pictures[0]))
                                <img src="{{ asset($product->pictures[0]->url) }}" style="max-width: 100px; max-height: 100px;">
                            @else
                                <img src="{{ asset('images/shop/image_default.png') }}" style="max-width: 100px; max-height: 100px;">
                            @endif
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="field">
                                    <h4>{{ str_limit($product->name, 18) }}</h4>

                                </div>
                                <div class="field">
                                    <br>
                                    <h5>Prix : {{ $product->price }} €</h5>
                                    @php(array_push($totalttc, $product->price * $baskets[$index][3]))
                                </div>
                                <div class="field">
                                    <h5>Quantité : {{ $baskets[$index][3] }}</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                    @php($index ++)
                @endforeach
                <hr>
                <h4 id="prixtotal">Prix total TTC : {{ array_sum($totalttc) }} €</h4>
            @else
                <br>
                <h4>Votre panier est vide</h4>
            @endif
        </div>

    </div>