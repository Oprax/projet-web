<div id="calendar1" class="item"> <!--Also change the height of calendar to 240px (fc-day-grid-container fc-scroller-->
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}

</div>
    <a id="dropdown-activity-sidebar" class="item">
        Activités
        <i class="dropdown icon"></i>
    </a>
    <div id="time-dropdown-sidebar" class="item hidden">
        @if(!empty($Future))
        <a href="{{route('activity.future')}}" class="item">Futur</a>
        <div id="ActivitésF" class="item">
            @foreach($Future as $future)
                <a href="{{route('activity.show', $future)}}" class="item">{{$future->name}}</a>
            @endforeach
        </div>
        @endif
        @if (! empty($Current))
        <a href="{{route('activity.current')}}" class="item">Courante</a>
        <div id="ActivitésC" class="item">
            @foreach($Current as $current)
                <a href="{{route('activity.show', $current)}}" class="item">{{$current->name}}</a>
            @endforeach
        </div>
        @endif

        @if(!empty($Past))
        <a href="{{route('activity.past')}}" class="item">Passé</a>
        <div id="ActivitésP" class="item">
            @foreach ($Past as $past)
                <a href="{{route('activity.show', $past)}}" class="item">{{$past->name}}</a>
            @endforeach
        </div>
        @endif
    </div>
        <a href="{{route('activity.create')}}" class="item">
            Proposé une activité
        </a>
