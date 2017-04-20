
@extends('layouts/app')


@section('content')
    <div>&nbsp;</div>
    <h1 class="ui header">Edition : {{$activity->name}}</h1>



    <div class="ui four stackable cards">
        @foreach($activity->photos as $pic)
                <div class="card">
                    <div class="image">
                        <img class="ui image" src="{{asset($pic->path)}}">
                    </div>
                    <div class="extra content">
                        {!! Form::open(['route' => ['activity.photos.destroy',$pic,$activity], 'method' => 'DELETE']) !!}
                            <button class="ui red bottom attached button" type="submit"><i class="erase icon"></i> Supprimer la photo</button>
                        {!! Form::close() !!}
                    </div>
                </div>
        @endforeach


                <div class="card">
                    <div class="image">
                        <i class="massive upload icon"></i>
                    </div>

                    {!! Form::open(['route' => ['activity.update', $activity], 'method' => 'PUT', 'class' => 'ui big form error']) !!}
                        <label for="pics" class="ui bottom attached icon button" onclick="document.getElementById('pic-file').click();">
                            <i class="file icon"></i>
                            Open File</label>
                        <input id="pic-file" type="file" name="pics" accept="image/*" multiple style="display: none" onchange="document.getElementById('pic-submit').click()">
                        <input id="pic-submit" type="submit" hidden>
                    {!! Form::close() !!}

                </div>
    </div>

    <div class="ui stackable grid">

        <div class="three wide computer only column"></div>
        <div class="sixteen wide tablet ten wide computer column">
            <?php if($errors){ $class= 'error';}
            $class = 'ui big form '. $class ?>
            {!! Form::open(['route' => ['activity.update', $activity], 'method' => 'PUT', 'class' => $class]) !!}
                <div class="required field">
                    <label for="name">Nom</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $activity->name }}" required>
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
                            <input type="text" name="date" placeholder="Date/Time" value="{{old('date') ? old('date') : Carbon\Carbon::parse($activity->date)->format('Y-m-d')}}">
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
                    <input type="text" name="lieu" value="{{ old('lieu') ? old('lieu') : $activity->lieu }}" required>
                    @if ($errors->has('lieu'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('lieu') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="required field">
                    <label for="description">Description</label>
                    <textarea name="description" required>{{ old('description') ? old('description') : $activity->description }}" </textarea>
                    @if ($errors->has('description'))
                        <div class="ui error message">
                            <strong>{{ $errors->first('description') }}</strong>
                        </div>
                    @endif
                </div>
                @if (Auth::user()->isBDE())
                    <div class="field">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="is_proposal" {{$activity->is_proposal ? 'checked' : ''}}>
                            <label>Activité en proposition</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="is_accept" {{$activity->is_accept ? 'checked' : ''}}>
                            <label>Activité accepté</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="can_subscribe" {{$activity->can_subscribe ? 'checked' : ''}}>
                            <label>Inscription autorisé</label>
                        </div>
                    </div>
                @endif
                <button class="ui button" type="submit">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection