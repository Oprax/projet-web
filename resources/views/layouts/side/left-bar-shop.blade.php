@foreach ($categories as $category)
    <div class="item">
        <p> {{ $category->name }}</p>
    </div>
@endforeach