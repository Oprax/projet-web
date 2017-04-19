@extends('layouts/app')

@section('content')
    <div>&nbsp;</div>
    <form class="ui form ui stackable grid" action="{{ route('activity.store') }}" method="post">
        <div class="sixteen wide column">
            <h1 class="ui dividing header">Proposation d'une activité</h1>
        </div>
        <div class="field five wide column">
            <label for="name">Nom de l'activité :</label>
            <input name="name" id="name" type="text">
        </div>
        <div class="field five wide column">
            <label for="lieu">Lieu de l'activité :</label>
            <input name="lieu" id="lieu" type="text">
        </div>
        <div class="field five wide column">
            <label for="date">Date de l'activité :</label>
            <input name="date" id="date" type="text">
        </div>
        <div class="field sixteen wide column">
            <label for="lieu">Description de l'activité :</label>
            <textarea name="description" id="description" type="text"></textarea>
        </div>
        <div class="field sixteen wide column">
            <label for="photo">Photo de l'activité</label>
            <input name="photo" id="photo" type="file">
        </div>
    </form>
@endsection