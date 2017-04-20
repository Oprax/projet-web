@extends('layouts/app')

@section('content')
    <h1>Ajouter un produit à la boutique</h1>


    {!! Form::open(['route' => 'shop_store_product', 'files'=>true]) !!}

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
            {{  Form::select('categoriesselect', $categoriesselect, null, array('class' => 'form-control')) }}
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
        <div class="field">
            <label>Options</label><br>
            <input type="checkbox" name="taille">
            <label>Demander la taille souhaité au client</label>
            <input type="checkbox" name="couleur">
            <label>Demander la couleur souhaité au client</label>
        </div>
        <br>
        <!--<div class="field">
            <label>Photos</label>
            <br>
            <button class="ui button" type="button" id="addimage">Ajouter une photo</button>

        </div>-->
        <div class="field">
            <label>Photos</label><br>
        <div class="secure"></div>
        <div class="control-group">
            <div class="controls">
                {!! Form::file('images[]', array('multiple'=>true)) !!}
                <p class="errors">{!!$errors->first('images')!!}</p>
                @if(Session::has('error'))
                    <p class="errors">{!! Session::get('error') !!}</p>
                @endif
            </div>
        </div>
        <br>

        <button class="ui button" type="submit">Ajouter le produit</button>
        </div>



    </form>


    {!! Form::close() !!}

@endsection