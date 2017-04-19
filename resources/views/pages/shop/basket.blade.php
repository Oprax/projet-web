@extends('layouts/app')

@section('content')

    <style>

    </style>

    <h1>Panier</h1>

    <div class="ui top attached tabular menu">
        <a class="item active" data-tab="commandes">Mes Commandes</a>
    </div>

    <div class="ui bottom attached tab segment active" data-tab="commandes">
        <table class="ui unstackable celled table">
            <thead>
            <tr><th>Mes articles</th>
                <th>Nom</th>
                <th>Taille</th>
                <th>Couleur</th>
                <th>Prix unitaire TTC</th>
                <th>Quantité</th>
                <th class="right aligned">Total TTC</th>
            </tr></thead>
            <tbody>
            @php($index = 0 )
            @foreach($products as $key => $product)
                    <tr class="">
                        <td class="ui link">
                            <a href="#">
                                <h4 class="ui image header">
                                    <img src="" class="ui mini rounded image">
                                    <div class="content">
                                        <div class="sub header">
                                        </div>
                                    </div>
                                </h4>
                            </a>
                        </td>


                        <td>
                            <div class="content">
                                {{ $product->name }}
                            </div>
                        </td>
                        <td id="taille">
                            <div class="content">
                                @if(isset($baskets[$index][1]) AND $baskets[$index][1] !=1)
                                    {{ $baskets[$index][1] }}
                                @else
                                    <i class="icon close"></i>
                                @endif
                            </div>
                        </td>

                        <td id="couleur">
                            <div class="content">
                                @if(isset($baskets[$index][2]) AND $baskets[$index][2] !=1)
                                    {{ $baskets[$index][2] }}
                                @else
                                    <i class="icon close"></i>
                                @endif
                            </div>
                        </td>
                        <td id="prix unitaire TTC">
                            <div class="content">
                                @if(isset($product->price))
                                    {{ $product->price . ' €'}}
                                @else
                                    <i class="icon close"></i>
                                @endif
                            </div>
                        </td>
                        <td class="Quantité">
                            @if(isset($baskets[$index][3]))
                                {{ $baskets[$index][3] }}
                            @else
                                <i class="icon close"></i>
                            @endif
                        </td>
                        <td class="right aligned">
                            @if(isset($product->price) AND isset($baskets[$index][3]))
                                {{ $product->price . ' €'}}
                            @else
                                <i class="icon close"></i>
                            @endif
                        </td>

                    </tr>
                @php($index ++)
            @endforeach
            </tbody>
        </table>
    </div>


@endsection