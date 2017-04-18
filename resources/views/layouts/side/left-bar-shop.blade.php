<div class="item">
    <a href="{{ route('shop_add_product') }}">Ajouter un produit</a>
</div>

@foreach ($categories as $category)
    <div class="item">
        <p> {{ $category->name }}</p>
    </div>
@endforeach