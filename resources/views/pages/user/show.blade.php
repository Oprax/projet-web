@extends('layouts/app')

@section('content')
<div>&nbsp;</div>
<div class="ui stackable grid">
     <div class="sixteen wide mobile six wide computer column">
        <img class="ui centered medium circular image" src="{{asset($User->avatar)}}" alt="">
     </div>
    <div class="sixteen wide mobile five wide computer column">
        <h1>{{$User->name}} {{$User->forename}}</h1>
        <h2>{{$User->status->name}}</h2>
        <div class="ui list">
            <div class="item">
                <i class="student icon"></i>
                <div class="content">
                    {{$User->role->name}}
                </div>
            </div>
            <div class="item">
                <i class="mail icon"></i>
                <div class="content">
                    {{$User->email}}
                </div>
            </div>
            <div class="item">
                <i class="birthday icon"></i>
                <div class="content">
                    {{Carbon\Carbon::parse($User->birthday)->format('d/m/Y')}}
                </div>
            </div>
            <div class="item">
                <i class="users icon"></i>
                <div class="content">
                    {{$User->association->name}}
                </div>
            </div>

        </div>
    </div>
</div>

<div class="ui top attached tabular menu">
    <a class="item" data-tab="activites">Mes Activités</a>
    <a class="item" data-tab="commandes">Mes Commandes</a>
</div>
<div class="ui bottom attached tab segment" data-tab="activites">
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui card">
                <div class="content">
                    <div class="header"></div>
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
<div class="ui bottom attached tab segment" data-tab="commandes">
    <table class="ui very basic collapsing celled table">
        <thead>
        <tr><th>Ma commande</th>
            <th>Date</th>
            <th>Prix</th>

        </tr></thead>
        <tbody>
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
                        Lorem
                    </div>
                </td>
                <td>
                    Lorem
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection