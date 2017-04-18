@extends('layouts/app')

@section('content')
    <div>&nbsp;</div>
    <div class="ui grid">
        <div class="three wide column computer only"></div>
        <div class="carousel sixteen wide phone ten wide computer column ">
            <div class="ui center"><img src="http://lorempicsum.com/futurama/800/500/1"></div>
            <div class="ui center"><img src="http://lorempicsum.com/futurama/800/500/2"></div>
            <div class="ui center"><img src="http://lorempicsum.com/futurama/800/500/3"></div>
            <div class="ui center"><img src="http://lorempicsum.com/futurama/800/500/4"></div>
        </div>
    </div>
    <div class="ui segment">
        Le Bureau des Elèves est composé de huit membres, élus en deux temps (responsables d’une fonction en fin d’année et vice responsable en début d’année), qui animent et structurent les différentes sections du BDE. Un bureau physique se trouve sur le campus pour les réunions et le matériel.
    </div>
    <div class="ui stackable grid">
        <div class="eight wide column">
            <h2>Activité</h2>
            <div class="ui grid">
                <div class="four wide column">
                    <div class="ui card">
                        <div class="content">
                            <div class="header">Activité 1</div>
                        </div>
                        <div class="image">
                            <img src="https://semantic-ui.com/images/avatar/large/helen.jpg">
                        </div>
                    </div>
                </div>
                <div class="twelve wide column">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam, dolorem eum excepturi explicabo harum id inventore ipsum iste maiores natus nemo odit qui quisquam ratione suscipit tempora vel, velit.
                    </p>
                    <div class="ui grid">
                        <div class="four wide column ui center">
                            <i class="thumbs up icon"></i>
                            5 J'aime
                        </div>
                        <div class="six wide column ui center">
                            <i class="comments up icon"></i>
                            10 commentaires
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
            <h2>Boutique</h2>
            <div class="ui grid">
                <div class="four wide column">
                    <div class="ui card">
                        <div class="content">
                            <div class="header">Produit 1</div>
                        </div>
                        <div class="image">
                            <img src="https://semantic-ui.com/images/avatar/large/helen.jpg">
                        </div>
                    </div>
                </div>
                <div class="twelve wide column">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam, dolorem eum excepturi explicabo harum id inventore ipsum iste maiores natus nemo odit qui quisquam ratione suscipit tempora vel, velit.
                    </p>
                    {{ '10' }}&nbsp;<i class="euro icon"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
