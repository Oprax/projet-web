@if(\Illuminate\Support\Facades\Auth::user()->isCesi())
<div class="item">
    <a href="{{ route('shop_add_product') }}">Ajouter un produit</a>
</div>
@endif

@foreach ($categories as $category)
    <div class="item">
        <a href="{{ route('shop_products_categories', ['category' => $category->name]) }}"> {{ $category->name }}</a>
    </div>
@endforeach