@extends('layouts/app')

@section('content')
<div>&nbsp;</div>
<h1>Gestions des utilisateurs</h1>
<div class="ui grid">
    <div class="sixteen wide phone sixteen wide computer column ">
        <table class="ui very basic collapsing celled table">
            <thead>
            <tr><th>Utilisateurs</th>
                <th>Email</th>
                <th>Date de naissance</th>
                <th>Rôle</th>
                <th>Association</th>
                <th>Validation</th>
                <th>Action</th>
            </tr></thead>
            <tbody>
            @foreach ($Users as $user)
            <tr class="{{$user->is_valid ? '' : 'warning'}}">
                <td class="ui link">
                    <a href="{{route('user.show', ['user' => $user->id])}}">
                    <h4 class="ui image header">
                        <img src="{{$user->avatar}}" class="ui mini rounded image">
                        <div class="content">
                            {{$user->name}} {{$user->forename}}
                            <div class="sub header">{{$user->status->name}}
                            </div>
                        </div>
                    </h4>
                    </a>
                </td>
                <td>
                    <div class="content">
                    {{$user->email}}
                    </div>
                </td>
                <td>
                    {{Carbon\Carbon::parse($user->birthday)->format('d/m/Y')}}
                </td>
                <td>
                    {{$user->role->name}}
                </td>
                <td>
                   @if(! empty($user->association_id))
                       {{$user->association->name}}
                   @endif
                </td>
                <td class="{{$user->is_valid ? '' : 'error'}}">
                    @if ($user->is_valid)
                        <i class="large green checkmark icon"></i>
                    @else
                        {!! Form::open(['route' => ['user.update',$user], 'method' => 'PUT']) !!}
                            <input type="hidden" name="approved" value="true">
                            <button class="ui small button" type="submit">Approuver</button>
                        {!! Form::close() !!}
                        <i class="large red icon close"></i>
                    @endif
                </td>
                <td>
                    <a href="{{route('user.edit', ['user' => $user->id])}}">
                        <button class="ui labeled icon button"><i class="large edit icon"></i>Editer</button>
                    </a>
                    {!! Form::open(['route' => ['user.destroy', $user], 'method' => 'DELETE']) !!}
                        <button class="ui labeled icon button" type="submit"><i class="large erase icon"></i>Supprimer</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot class="full-width">
            <tr>
                <th></th>
                <th colspan="5">
                    {!! Form::open(['route' => ['user.update', $user], 'method' => 'PUT']) !!}
                        <input type="hidden" name="approved_all" value="true">
                        <button class="ui right floated small primary button" type="submit">Approuver Tous</button>
                    {!! Form::close() !!}
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection