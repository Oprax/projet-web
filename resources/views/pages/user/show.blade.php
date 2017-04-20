@extends('layouts/app')

@section('content')
<div>&nbsp;</div>



<div id="griduser" class="ui stackable grid">
     <div class="sixteen wide mobile six wide computer column">
        <img class="ui centered medium circular image" src="{{asset($User->avatar)}}" alt="">
     </div>

    <div id="name" class="sixteen wide mobile five wide computer column">
        <h1>{{$User->name}} {{$User->forename}}</h1>
        <h2>{{$User->status->name}}</h2>
        <div class="ui list">
            <div class="item">
                <i class="student icon"></i>
                <div id="role" class="content">
                    {{$User->role->name}}
                </div>
            </div>
            <div class="item">
                <i class="mail icon"></i>
                <div id="email" class="content">
                    {{$User->email}}
                </div>
            </div>


            <div class="item">
                <i class="birthday icon"></i>
                <div id="birthday" class="content">
                    {{Carbon\Carbon::parse($User->birthday)->format('d/m/Y')}}
                </div>
            </div>


            <div class="item">
                <i class="users icon"></i>
                <div id="association" class="content">
                    @if(! empty($User->association))
                        {{$User->association->name}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<div id="raccourcis" class="ui top attached tabular menu">
    <a class="item" data-tab="activites">Mes Activités</a>
    <a class="item" data-tab="commandes">Mes Commandes</a>
</div>
<div class="ui bottom attached tab segment" data-tab="activites">
    @foreach($User->subscribes as $activity)
        <?php $act = $activity->activity; ?>
        @include('layouts/activity')
    @endforeach
</div>
<div class="ui bottom attached tab segment" data-tab="commandes">
    <table class="ui very basic collapsing celled table">
        <thead>
        <tr><th>Numéro</th>
            <th>Date</th>
            <th>Adresse</th>
            <th>Nombre d'article</th>
            <th>Prix</th>

        </tr></thead>
        <tbody>
            @foreach($Orders as $order)
            <tr>
                <td class="ui link">
                    <a href="">
                       <div class="content">
                           {{$order->id}}
                       </div>
                    </a>
                </td>
                <td>
                    {{$order->created_at}}
                </td>
                <td>
                    <div class="ui list">
                        <div class="item">
                            <div class="content">
                                {{$order->adresse}}
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                {{$order->zip_code}} {{$order->city}}
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                {{$order->country}}
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    {{$order->quantities}} article(s)
                </td>
                <td>
                    {{$order->price}} €
                </td>
            </tr>
                @endforeach
        </tbody>
    </table>
</div>

@endsection