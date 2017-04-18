<link rel="stylesheet" href="{{asset('semantic-ui/semantic.min.css')}}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<<<<<<< develop
<link rel="stylesheet" href="{{asset('semantic-ui/calendar.min.css')}}">
@if(Request::is('/'))
=======
@if(Request::is('/') OR Request::is('shop*'))
>>>>>>> add shop/category + optimisation query
    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}">
@endif