    <div id="basket" class="text">
    @if(!Request::is('shop/basket'))
    <h2><a class="header" href="{{ route('shop_basket') }}" >Panier</a></h2>
    @endif
</div>
