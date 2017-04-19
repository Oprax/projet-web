<div class="item" style="height: 330px"> <!--Also change the height of calendar to 240px (fc-day-grid-container fc-scroller-->
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
</div>
<div class="item">
    <a class="header" href="{{route('activity.index')}}">
        Activités
    </a>
    <div class="menu">
        <a href="{{route('activity.future')}}" class="item">Futur</a>
        <div class="menu" style="padding-left: 15px">
            <a href="" class="item">Activité 9</a>
        </div>
    </div>
    <div class="menu">
        <a href="{{route('activity.current')}}" class="item">Courante</a>
        <div class="menu" style="padding-left: 15px">
            <a href="" class="item">Activité 5</a>
        </div>
    </div>
    <div class="menu">
        <a href="{{route('activity.past')}}" class="item">Passé</a>
        <div class="menu" style="padding-left: 15px">
            <a href="" class="item">Activité 4</a>
        </div>
    </div>
</div>
