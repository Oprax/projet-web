@extends('layouts/app')

@section('content')

    <div>&nbsp;</div>
    <h1 class="ui dividing header">Proposition d'une activité</h1>

    {!! Form::open(['route' => ['activity.store'], 'method' => 'POST', 'class' => 'ui big form error', 'files' => true]) !!}
    <div class="ui centered aligned card">
        <div class="ui center aligned segment">
            <i class="massive upload icon"></i>

        <label for="pics" class="ui orange bottom attached icon button" onclick="document.getElementById('pic-file').click();">
            <i class="upload icon"></i>
            Open File</label>
        <input id="pic-file" type="file" name="pics" accept="image/*" style="display: none" >
        @if ($errors->has('pics'))
            <div class="ui error message">
                <strong>{{ $errors->first('pics') }}</strong>
            </div>
        @endif
        </div>
    </div>

    <div class="ui stackable grid">

        <div class="three wide computer only column"></div>
        <div class="sixteen wide tablet ten wide computer column">
            <?php if($errors){ $class= 'error';}
            $class = 'ui big form '. $class ?>
            <div class="required field">
                <label for="name">Nom</label>
                <input type="text" name="name" value="{{ old('name') ? old('name') : ''}}" required>

                @if ($errors->has('name'))
                    <div class="ui error message">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
            </div>
            <div class="required field">
                <label for="date">Date</label>
                <div class="ui calendar" id="calendarActivity">
                    <div class="ui input left icon">
                        <i class="calendar icon"></i>
                        <input type="text" name="date" placeholder="Date/Time" value="{{old('date') ? old('date') : ''}}">
                    </div>
                </div>
                @if ($errors->has('date'))
                    <div class="ui error message">
                        <strong>{{ $errors->first('date') }}</strong>
                    </div>
                @endif
            </div>
            <div class="required field">
                <label for="lieu">Lieu</label>
                <input type="text" name="lieu" value="{{ old('lieu') ? old('lieu') : ''}}" required>
                @if ($errors->has('lieu'))
                    <div class="ui error message">
                        <strong>{{ $errors->first('lieu') }}</strong>
                    </div>
                @endif
            </div>
            <div class="required field">
                <label for="description">Description</label>
                <textarea name="description" required>{{ old('description') ? old('description') : '' }} </textarea>
                @if ($errors->has('description'))
                    <div class="ui error message">
                        <strong>{{ $errors->first('description') }}</strong>
                    </div>
                @endif
            </div>
            <div class="required field">
                <label for="association">Proposer par l'association</label>
                <select name="association" class="ui dropdown">
                    <option value="">Association</option>
                    @foreach($Associations as $assoc)
                        <option>{{$assoc->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('association'))
                    <div class="ui error message">
                        <strong>{{ $errors->first('association') }}</strong>
                    </div>
                @endif
            </div>
            @if (Auth::user()->isCesiBDE())
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input type="checkbox" name="is_proposal">
                        <label>Activité en proposition</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input type="checkbox" name="is_accept">
                        <label>Activité accepté</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input type="checkbox" name="can_subscribe">
                        <label>Inscription autorisé</label>
                    </div>
                </div>
            @else
                <input type="checkbox" name="is_proposal" hidden checked>
            @endif
            <button class="ui button" type="submit">Submit</button>

        </div>
    </div>
    {!! Form::close() !!}
@endsection