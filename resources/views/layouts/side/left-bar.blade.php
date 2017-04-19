<div class="item" style="height: 330px"> <!--Also change the height of calendar to 240px (fc-day-grid-container fc-scroller-->
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
        <div class="menu" style="padding-left: 15px">
            @foreach($Future as $future)
                <a href="{{route('activity.show', $future)}}" class="item">{{$future->name}}</a>
            @endforeach
        </div>
    </div>
    @endif
    @if (! empty($Current))
    <div class="menu">
        <a href="{{route('activity.current')}}" class="item">Courante</a>
        <div class="menu" style="padding-left: 15px">
            @foreach($Current as $current)
                <a href="{{route('activity.show', $current)}}" class="item">{{$current->name}}</a>
            @endforeach
        </div>
    </div>
    @endif

    @if(!empty($Past))
    <div class="menu">
        <a href="{{route('activity.past')}}" class="item">Passé</a>
        <div class="menu" style="padding-left: 15px">
            @foreach ($Past as $past)
                <a href="{{route('activity.show', $past)}}" class="item">{{$past->name}}</a>
            @endforeach
        </div>
    </div>
    @endif
</div>
