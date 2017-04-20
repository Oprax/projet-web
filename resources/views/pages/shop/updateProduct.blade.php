@extends('layouts/app')

@section('content')
    <h1>Modifier un produit à la boutique</h1>


    {!! Form::open(['route' => ['shop_update_product'], 'files'=>true, 'method' => 'PUT']) !!}


    <form class="ui form">
        <div class="field">
            <label>Nom</label>
            <input type="text" name="name" placeholder="Nom du produit" value="{{ $product->name }}" class="form-control">
        </div>
        <br>
        <div class="field">
            <label>Description</label>
            <textarea name="description" placeholder="Description du produit" class="form-control">{{ $product->description }}</textarea>
        </div>
        <br>
        <div class="field">
            <label>Catégorie</label>
            {{  Form::select('categoriesselect', $categoriesselect, null, array('class' => 'form-control')) }}
            <input type="text" name="new_cat" placeholder="Nom de la nouvelle catégorie" value="{{ $product->category->name }}" class="form-control">
        </div>
        <br>
        <div class="field">
            <label>Prix</label>
            <input type="text" name="price" placeholder="Prix du produit" value="{{ $product->price }}" class="form-control">
        </div>
        <br>
        <div class="field">
            <label>Quantités disponible</label>
            <input type="number" name="quantity" placeholder="Quantité restante du produit" value="{{ $product->quantities }}" class="form-control">
            @if($product->quantities == null)
                <input type="checkbox" name="quantityIlimity" value="1" checked>
            @else
                <input type="checkbox" name="quantityIlimity">
            @endif
            <label>Quantités ilimités</label>
        </div>
        <br>
        <div class="field">
            <label>Options</label><br>
            @if($product->size == 1)
                <input type="checkbox" name="taille" value="1" checked>
            @else
                <input type="checkbox" name="taille">
            @endif
            <label>Demander la taille souhaité au client</label>
            @if($product->color == 1)
                <input type="checkbox" name="couleur" value="1" checked>
            @else
                <input type="checkbox" name="couleur">
            @endif
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
        <input type="text" class="hidden" name="product_id" value="{{ $product->id }}">
        <button class="ui button" type="submit">Modifier le produit</button>
        </div>



    </form>


    {!! Form::close() !!}

@endsection