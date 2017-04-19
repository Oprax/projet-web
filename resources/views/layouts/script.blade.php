<!-- Latest compiled and minified JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>
@if(env('APP_DEBUG') == 1)
    <script src="{{asset('semantic-ui/semantic.js')}}"></script>
@else
    <script src="{{asset('semantic-ui/semantic.min.js')}}"></script>
@endif
<script src="{{asset('semantic-ui/calendar.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<script src="{{ asset('slick/slick.js') }}"></script>

@if(Request::is('/'))
    <script>
        $(document).ready(function () {
          $('.carousel').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            infinite: true,
            arrows: false
          })
        })
    </script>
@endif

@if(Request::is('shop*'))
<script>
    $(document).ready(function () {
        $('.carousel').slick({
            autoplay: false,
            dots: true,
            infinite: true,
            arrows: true
        })
    })
</script>
<script src="{{ asset('js/addproduct.js') }}"></script>
<script src="{{ asset('js/addbasket.js') }}"></script>
@endif
<script src="{{ asset('js/style.js') }}"></script>
<script>
    $('#MenuButtonSideBar').click(function() {
        $('.ui.sidebar')
            .sidebar('toggle')
        ;
    });
</script>

<script>
    $('#calendarYearFirst').calendar({
        startMode: 'year',
        type: 'date',
        formatter: {
            date: function (date, settings) {
                if (!date) return '';
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                return year + '-' + month + '-' + day;
            }
        }
    });

    $(document).ready(function(){
        $('.right.menu.open').on("click",function(e){
            e.preventDefault();
            $('.ui.vertical.menu').toggle();
        });

        $('.ui.dropdown').dropdown();
        $('.ui.dropdown.item').dropdown();
    });


    $('.menu .item').tab();

    $('#dropdown-user-sidebar').click(function(event){
        event.stopPropagation();
        if( $('#account-dropdown-sidebar').hasClass('hidden')){
            $('#account-dropdown-sidebar').removeClass('hidden');
        }
        else {
            $('#account-dropdown-sidebar').addClass('hidden');
        }
    });
    $(window).click(function(){
        if ( ! $('#account-dropdown-sidebar').hasClass('hidden') ) {
            $('#account-dropdown-sidebar').addClass('hidden');
        }
    });
</script>



