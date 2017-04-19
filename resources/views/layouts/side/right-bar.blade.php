<div class="text">

    <div class="ui segment">
        <div class="ui centered aligned header">
            <h2>Boutique</h2>
        </div>
        @foreach ($Products as $product)
        <div class="ui segment">
            <div class="ui centered aligned header">
                {{ $product->name }}
            </div>
            <div class="ui grid">
                <img class="ui  centered medium image" src="">
            </div>
            <div class="ui center aligned grid">
                <div class="ui circular segment">
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
