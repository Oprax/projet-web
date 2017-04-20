<div id="calendar1" class="item"> <!--Also change the height of calendar to 240px (fc-day-grid-container fc-scroller-->
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}

</div>
<div class="item">
    <a class="header" href="{{route('activity.index')}}">
        Activités
    </a>
    @if(!empty($Future))
    <div class="menu">
        <a href="{{route('activity.future')}}" class="item">Futur</a>
        <div id="ActivitésF" class="menu">
            @foreach($Future as $future)
                <a href="{{route('activity.show', $future)}}" class="item">{{$future->name}}</a>
            @endforeach
        </div>
    </div>
    @endif
    @if (! empty($Current))
    <div class="menu">
        <a href="{{route('activity.current')}}" class="item">Courante</a>
        <div id="ActivitésC" class="menu">
            @foreach($Current as $current)
                <a href="{{route('activity.show', $current)}}" class="item">{{$current->name}}</a>
            @endforeach
        </div>
    </div>
    @endif

    @if(!empty($Past))
    <div class="menu">
        <a href="{{route('activity.past')}}" class="item">Passé</a>
        <div id="ActivitésP" class="menu">
            @foreach ($Past as $past)
                <a href="{{route('activity.show', $past)}}" class="item">{{$past->name}}</a>
            @endforeach
        </div>
    </div>
    @endif
    <div class="menu">
        <a href="{{route('activity.create')}}" class="item">Proposé une activité</a>
    </div>
</div>
