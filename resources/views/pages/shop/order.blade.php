@extends('layouts/app')

@section('content')


    <h2>Commande du {{ $order->created_at }}</h2>

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
                            {{ $product->product->name }}
                        </div>
                    </td>
                    <td id="taille">
                        <div class="content">
                            @if(isset($product->size))
                                {{ $product->size }}
                            @else
                                <i class="icon close"></i>
                            @endif
                        </div>
                    </td>

                    <td id="couleur">
                        <div class="content">
                            @if(isset($product->color))
                                {{ $product->color }}
                            @else
                                <i class="icon close"></i>
                            @endif
                        </div>
                    </td>
                    <td id="prix unitaire TTC">
                        <div class="content">
                            @if(isset($product->product->price))
                                {{ $product->product->price . ' €'}}
                            @else
                                <i class="icon close"></i>
                            @endif
                        </div>
                    </td>
                    <td class="Quantité">
                        @if(isset($product->quantity))
                            {{ $product->quantity }}
                            @php(array_push($totalqtt, $product->quantity))
                        @else
                            <i class="icon close"></i>
                        @endif
                    </td>
                    <td class="right aligned">
                        @if(isset($product->price))

                            {{ $product->price . ' €'}}
                            @php(array_push($totalttc, $product->price))
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

@endsection