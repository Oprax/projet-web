@extends('layouts/app')

@section('content')



    <h1>Panier</h1>

    <button class="ui button" type="button" id="delpanier" >Supprimer panier</button>

    <div class="ui top attached tabular menu">
        <a class="item active" data-tab="commandes">Mes articles</a>
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
            @php($index = 0)
            @php($totalttc = array())
            @php($totalqtt = array())

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
                                @php(array_push($totalqtt, $baskets[$index][3]))
                            @else
                                <i class="icon close"></i>
                            @endif
                        </td>
                        <td class="right aligned">
                            @if(isset($product->price) AND isset($baskets[$index][3]))

                                {{ $product->price * $baskets[$index][3] . ' €'}}
                                @php(array_push($totalttc, $product->price * $baskets[$index][3]))
                            @else
                                <i class="icon close"></i>
                            @endif
                        </td>

                    </tr>
                @php($index ++)
            @endforeach
            </tbody>
            <tfoot><tr>
                <th><h4>Total</h4></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <th>
                    <h4>{{ array_sum($totalttc) }} €</h4>
                </th>

            </tr></tfoot>
        </table>
    </div>


    {!! Form::open(['route' => 'shop_basket_confirm']) !!}
        <input type="text" class="hidden" name="price_total" value="{{ array_sum($totalttc) }}">
        <input type="text" class="hidden" name="quantity_total" value="{{ array_sum($totalqtt) }}">

    <button class="ui button" type="submit">Valider mon panier 2</button>


    {!! Form::close() !!}


@endsection