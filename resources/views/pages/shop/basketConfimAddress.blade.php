@extends('layouts/app')

@section('content')
    <h1>Adresse de livraison</h1>


    {!! Form::open(['route' => 'shop_basket_confirm_address']) !!}

    <form class="ui form">
        <div class="field">
            <label>Pays</label>
            <input type="text" name="country" placeholder="France" class="form-control">
        </div>
        <br>
        <div class="field">
            <label>Adresse</label>
            <input type="text" name="address" placeholder="1 rue de la mairie" class="form-control">
        </div>
        <br>
        <div class="field">
            <label>Code Postale</label>
            <input type="number" name="codePostale" placeholder="67 380" class="form-control">
        </div>
        <br>
        <div class="field">
            <label>Ville</label>
            <input type="text" name="city" placeholder="Lingolsheim" class="form-control">
        </div>
        <br>

        <br>
        <button class="ui button" type="submit">Acheter</button>
    </form>


    {!! Form::close() !!}

@endsection