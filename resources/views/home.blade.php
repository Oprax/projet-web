@extends('layouts/app')

@section('content')
    <div>&nbsp;</div>
    <div class="ui grid">
        <div class="three wide column computer only"></div>
        <div class="carousel sixteen wide phone ten wide computer column ">
            @foreach($activities->take(4) as $activity)
                <a class="ui center" href="{{ route('activity.show', $activity) }}">
                    <img src="{{ $activity->photo }}">
                </a>
            @endforeach
        </div>
    </div>
    <div id="segment" class="ui segment">
        Le Bureau des Elèves est composé de huit membres, élus en deux temps (responsables d’une fonction en fin d’année et vice responsable en début d’année), qui animent et structurent les différentes sections du BDE. Un bureau physique se trouve sur le campus pour les réunions et le matériel.
    </div>
    <div class="ui stackable grid" id="app">
        <div class="eight wide column">
            <h2 id="header" class="ui header"><a href="{{ route('activity.index') }}">Activité</a></h2>
            <div id="greed" class="ui grid">
                <div class="four wide column">
                    <div class="ui card">
                        <div class="content">
                            <div class="header"><a href="{{ route('activity.show', $activities->first()) }}">{{ $activities->first()->name }}</a></div>
                        </div>
                        <div class="image">
                            <img src="{{ $activities->first()->photo }}">
                        </div>
                    </div>
                </div>
                <div class="twelve wide column">
                    <p>
                        {{ $activities->first()->description }}
                    </p>
                    <div class="ui grid">
                        <div class="four wide column ui center">
                            <like likes="{{ $activities->first()->likes->count() }}" likable-id="{{ $activities->first()->id }}" user-id="{{ Auth::user()->id }}" type="Activity"></like>
                        </div>
                        <div class="six wide column ui center">
                            <i class="comments up icon"></i>
                            {{ $activities->first()->comments->count() }} commentaires
                        </div>
                        <div class="four column ui center">
                            <button class="ui icon button">
                                <i class="share alternate icon"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="eight wide column">
            <h2 id="header2" class="ui header"><a href="{{ route('shop_home') }}">Boutique</a></h2>
            <div id="grids" class="ui grid">
                <div class="four wide column">
                    <div class="ui card">
                        <div class="content">
                            <div class="header">{{ $product->name }}</div>
                        </div>
                        <div class="image">
                            <img src="{{asset($pictureProduct->url)}}">
                        </div>
                    </div>
                </div>
                <div class="twelve wide column">
                    <p>
                        {{$product->description}}
                    </p>
                    {{ $product->price }}&nbsp;<i class="euro icon"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
