<link rel="stylesheet" href="{{asset('semantic-ui/semantic.min.css')}}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@if(Request::is('/'))
    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}">
@endif