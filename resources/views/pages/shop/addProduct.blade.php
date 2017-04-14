@extends('layouts/app')

@section('content')
    <h1>Ajouter un produit à la boutique</h1>


    {!! Form::open(['route' => 'shop_store_product']) !!}

    <form class="ui form">
        <div class="field">
            <label>Nom</label>
            <input type="text" name="name" placeholder="Nom du produit" class="form-control">
        </div>
        <br>
        <div class="field">
            <label>Description</label>
            <textarea name="description" placeholder="Description du produit" class="form-control"></textarea>
        </div>
        <br>
        <div class="field">
            <label>Catégorie</label>
            <input type="text" name="new_cat" placeholder="Nom de la nouvelle catégorie" class="form-control">
        </div>
        <br>
        <div class="field">
            <label>Prix</label>
            <input type="text" name="price" placeholder="Prix du produit" class="form-control">
        </div>
        <br>
        <div class="field">
            <label>Quantités disponible</label>
            <input type="number" name="quantity" placeholder="Quantité restante du produit" class="form-control">
            <input type="checkbox" name="quantityIlimity">
            <label>Quantités ilimités</label>
        </div>
        <br>
        <button class="ui button" type="submit">Ajouter le produit</button>
    </form>


    {!! Form::close() !!}

@endsection