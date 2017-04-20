<?php
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

    {!! Form::open(['route' => ['activity.update', $activity], 'method' => 'PUT', 'class' => 'ui big form error', 'files' => true]) !!}
    <label for="pics" class="ui bottom attached icon button" onclick="document.getElementById('pic-file').click();">
        <i class="file icon"></i>
        Open File</label>
    <input id="pic-file" type="file" name="pics" accept="image/*" multiple style="display: none" onchange="document.getElementById('pic-submit').click()">
    <input id="pic-submit" type="submit" hidden>
    {!! Form::close() !!}

</div>
</div>
