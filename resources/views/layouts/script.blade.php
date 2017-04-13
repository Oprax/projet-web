<script src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>
@if(env('APP_DEBUG') == 1)
    <script src="{{asset('semantic-ui/semantic.js')}}"></script>
    <!--DEBUG BAR LARAVEL-->

    <script type="text/javascript">
        var phpdebugbar = new DebugBar();
        phpdebugbar.addTab("messages", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Messages", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
        phpdebugbar.addIndicator("time", new PhpDebugBar.DebugBar.Indicator({"icon":"clock-o","tooltip":"Request Duration"}), "right");
        phpdebugbar.addTab("timeline", new PhpDebugBar.DebugBar.Tab({"icon":"tasks","title":"Timeline", "widget": new PhpDebugBar.Widgets.TimelineWidget()}));
        phpdebugbar.addIndicator("memory", new PhpDebugBar.DebugBar.Indicator({"icon":"cogs","tooltip":"Memory Usage"}), "right");
        phpdebugbar.addTab("exceptions", new PhpDebugBar.DebugBar.Tab({"icon":"bug","title":"Exceptions", "widget": new PhpDebugBar.Widgets.ExceptionsWidget()}));
        phpdebugbar.addTab("views", new PhpDebugBar.DebugBar.Tab({"icon":"leaf","title":"Views", "widget": new PhpDebugBar.Widgets.TemplatesWidget()}));
        phpdebugbar.addTab("route", new PhpDebugBar.DebugBar.Tab({"icon":"share","title":"Route", "widget": new PhpDebugBar.Widgets.VariableListWidget()}));
        phpdebugbar.addIndicator("currentroute", new PhpDebugBar.DebugBar.Indicator({"icon":"share","tooltip":"Route"}), "right");
        phpdebugbar.addTab("queries", new PhpDebugBar.DebugBar.Tab({"icon":"inbox","title":"Queries", "widget": new PhpDebugBar.Widgets.SQLQueriesWidget()}));
        phpdebugbar.addTab("emails", new PhpDebugBar.DebugBar.Tab({"icon":"inbox","title":"Mails", "widget": new PhpDebugBar.Widgets.MailsWidget()}));
        phpdebugbar.addTab("session", new PhpDebugBar.DebugBar.Tab({"icon":"archive","title":"Session", "widget": new PhpDebugBar.Widgets.VariableListWidget()}));
        phpdebugbar.addTab("request", new PhpDebugBar.DebugBar.Tab({"icon":"tags","title":"Request", "widget": new PhpDebugBar.Widgets.VariableListWidget()}));
        phpdebugbar.setDataMap({
            "messages": ["messages.messages", []],
            "messages:badge": ["messages.count", null],
            "time": ["time.duration_str", '0ms'],
            "timeline": ["time", {}],
            "memory": ["memory.peak_usage_str", '0B'],
            "exceptions": ["exceptions.exceptions", []],
            "exceptions:badge": ["exceptions.count", null],
            "views": ["views", []],
            "views:badge": ["views.nb_templates", 0],
            "route": ["route", {}],
            "currentroute": ["route.uri", ],
            "queries": ["queries", []],
            "queries:badge": ["queries.nb_statements", 0],
            "emails": ["swiftmailer_mails.mails", []],
            "emails:badge": ["swiftmailer_mails.count", null],
            "session": ["session", {}],
            "request": ["request", {}]
        });
        phpdebugbar.restoreState();
        phpdebugbar.ajaxHandler = new PhpDebugBar.AjaxHandler(phpdebugbar);
        phpdebugbar.ajaxHandler.bindToXHR();
        phpdebugbar.setOpenHandler(new PhpDebugBar.OpenHandler({"url":"https:\/\/demo.adminlte.acacha.org\/_debugbar\/open"}));
        phpdebugbar.addDataSet({"__meta":{"id":"07f58e23abc62d97ada22fb0ba488e6d","datetime":"2017-04-10 11:07:04","utime":1491822424.566319,"method":"GET","uri":"\/password\/reset","ip":"192.168.50.1"},"php":{"version":"7.1.3-3+deb.sury.org~xenial+1","interface":"fpm-fcgi"},"messages":{"count":0,"messages":[]},"time":{"start":1491822424.54544,"end":1491822424.566338,"duration":0.020898103713989258,"duration_str":"20.9ms","measures":[{"label":"Booting","start":1491822424.54544,"relative_start":0,"end":1491822424.558581,"relative_end":1491822424.558581,"duration":0.013141155242919922,"duration_str":"13.14ms","params":[],"collector":null},{"label":"Application","start":1491822424.554662,"relative_start":0.009222030639648438,"end":1491822424.56634,"relative_end":1.9073486328125e-6,"duration":0.011677980422973633,"duration_str":"11.68ms","params":[],"collector":null}]},"memory":{"peak_usage":2097152,"peak_usage_str":"2MB"},"exceptions":{"count":0,"exceptions":[]},"views":{"nb_templates":4,"templates":[{"name":"adminlte::auth.passwords.email (vendor\/acacha\/admin-lte-template-laravel\/resources\/views\/auth\/passwords\/email.blade.php)","param_count":0,"params":[],"type":"blade"},{"name":"adminlte::layouts.partials.scripts_auth (vendor\/acacha\/admin-lte-template-laravel\/resources\/views\/layouts\/partials\/scripts_auth.blade.php)","param_count":6,"params":["obLevel","__env","app","errors","signedIn","user"],"type":"blade"},{"name":"adminlte::layouts.auth (vendor\/acacha\/admin-lte-template-laravel\/resources\/views\/layouts\/auth.blade.php)","param_count":6,"params":["obLevel","__env","app","errors","signedIn","user"],"type":"blade"},{"name":"adminlte::layouts.partials.htmlheader (vendor\/acacha\/admin-lte-template-laravel\/resources\/views\/layouts\/partials\/htmlheader.blade.php)","param_count":6,"params":["obLevel","__env","app","errors","signedIn","user"],"type":"blade"}]},"route":{"uri":"GET password\/reset","middleware":"web","controller":"App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm","namespace":"App\\Http\\Controllers","prefix":null,"where":[],"as":"password.request","file":"app\/Http\/Controllers\/Auth\/ForgotPasswordController.php:28-31"},"queries":{"nb_statements":0,"nb_failed_statements":0,"accumulated_duration":0,"accumulated_duration_str":"0\u03bcs","statements":[]},"swiftmailer_mails":{"count":0,"mails":[]},"session":{"_token":"Y6pIxNqMlHSLsEBAPhFZgq2jgXBdwNlq2tGhfoHR","_previous":"array:1 [\n  \"url\" => \"https:\/\/demo.adminlte.acacha.org\/password\/reset\"\n]","PHPDEBUGBAR_STACK_DATA":"[]"},"request":{"format":"html","content_type":"text\/html; charset=UTF-8","status_text":"OK","status_code":"200","request_query":"[]","request_request":"[]","request_headers":"array:9 [\n  \"accept-language\" => array:1 [\n    0 => \"fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4\"\n  ]\n  \"accept-encoding\" => array:1 [\n    0 => \"gzip, deflate, sdch, br\"\n  ]\n  \"referer\" => array:1 [\n    0 => \"https:\/\/www.google.fr\/\"\n  ]\n  \"accept\" => array:1 [\n    0 => \"text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8\"\n  ]\n  \"user-agent\" => array:1 [\n    0 => \"Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/54.0.2840.99 Safari\/537.36\"\n  ]\n  \"upgrade-insecure-requests\" => array:1 [\n    0 => \"1\"\n  ]\n  \"host\" => array:1 [\n    0 => \"demo.adminlte.acacha.org\"\n  ]\n  \"content-length\" => array:1 [\n    0 => \"\"\n  ]\n  \"content-type\" => array:1 [\n    0 => \"\"\n  ]\n]","request_server":"array:32 [\n  \"USER\" => \"www-data\"\n  \"HOME\" => \"\/var\/www\"\n  \"HTTP_ACCEPT_LANGUAGE\" => \"fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4\"\n  \"HTTP_ACCEPT_ENCODING\" => \"gzip, deflate, sdch, br\"\n  \"HTTP_REFERER\" => \"https:\/\/www.google.fr\/\"\n  \"HTTP_ACCEPT\" => \"text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8\"\n  \"HTTP_USER_AGENT\" => \"Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/54.0.2840.99 Safari\/537.36\"\n  \"HTTP_UPGRADE_INSECURE_REQUESTS\" => \"1\"\n  \"HTTP_HOST\" => \"demo.adminlte.acacha.org\"\n  \"REDIRECT_STATUS\" => \"200\"\n  \"HTTPS\" => \"on\"\n  \"SERVER_NAME\" => \"demo.adminlte.acacha.org\"\n  \"SERVER_PORT\" => \"443\"\n  \"SERVER_ADDR\" => \"192.168.50.180\"\n  \"REMOTE_PORT\" => \"62122\"\n  \"REMOTE_ADDR\" => \"192.168.50.1\"\n  \"SERVER_SOFTWARE\" => \"nginx\/1.11.9\"\n  \"GATEWAY_INTERFACE\" => \"CGI\/1.1\"\n  \"SERVER_PROTOCOL\" => \"HTTP\/2.0\"\n  \"DOCUMENT_ROOT\" => \"\/var\/www\/html\/demo.adminlte.acacha.org\/public\"\n  \"DOCUMENT_URI\" => \"\/index.php\"\n  \"REQUEST_URI\" => \"\/password\/reset\"\n  \"SCRIPT_NAME\" => \"\/index.php\"\n  \"SCRIPT_FILENAME\" => \"\/var\/www\/html\/demo.adminlte.acacha.org\/public\/index.php\"\n  \"CONTENT_LENGTH\" => \"\"\n  \"CONTENT_TYPE\" => \"\"\n  \"REQUEST_METHOD\" => \"GET\"\n  \"QUERY_STRING\" => \"\"\n  \"FCGI_ROLE\" => \"RESPONDER\"\n  \"PHP_SELF\" => \"\/index.php\"\n  \"REQUEST_TIME_FLOAT\" => 1491822424.5454\n  \"REQUEST_TIME\" => 1491822424\n]","request_cookies":"[]","response_headers":"array:3 [\n  \"cache-control\" => array:1 [\n    0 => \"no-cache, private\"\n  ]\n  \"content-type\" => array:1 [\n    0 => \"text\/html; charset=UTF-8\"\n  ]\n  \"Set-Cookie\" => array:2 [\n    0 => \"XSRF-TOKEN=eyJpdiI6IlBZSmNxejNzdGhGRHl6a1FUMDZcL3VRPT0iLCJ2YWx1ZSI6IlJEemh5MDRXRm53N1dMS1RIbU0wcVgyc1FKV3pNQzBjdWZIaFlMMFhXVXlEaEd6OEZ0akppY0hJQUgzQnZmUGlBVVp0Q0N0TTU3RFVSWm5lU0Q2WXpBPT0iLCJtYWMiOiIyMjlkMDc0OTMxMmVlN2EyOGQxMGY3N2Y1ODFmYmJlYTY2OTFmYTEyNDE3YTZjMDQ2MTY5OWZjNTUwZjQwMWJhIn0%3D; expires=Mon, 10-Apr-2017 13:07:04 GMT; path=\/\"\n    1 => \"laravel_session=eyJpdiI6IjRKSVBVOVpRN3JaaXoxNDhPaG5PRUE9PSIsInZhbHVlIjoiWkt4U1BEWURQQUw3Q0pKckRqMlB6bE5cL2trNkxrSzFcL2pQS3VrVFZhSW0zUzZuQUJsZWpcL1BCTnN5cVE2MG52QjJsekJPWDRZWFlucjJHcUlwWTZVcEE9PSIsIm1hYyI6ImQyZmYyZjRmODJjMWZkNTE5ZDEwNTlhZjIxY2MwY2E2YWU0Yjk2OWU2NGI4Mjk4OTBjNzZhYWQ3YjllYmM1ZWMifQ%3D%3D; expires=Mon, 10-Apr-2017 13:07:04 GMT; path=\/; httponly\"\n  ]\n]","path_info":"\/password\/reset","session_attributes":"array:3 [\n  \"_token\" => \"Y6pIxNqMlHSLsEBAPhFZgq2jgXBdwNlq2tGhfoHR\"\n  \"_previous\" => array:1 [\n    \"url\" => \"https:\/\/demo.adminlte.acacha.org\/password\/reset\"\n  ]\n  \"PHPDEBUGBAR_STACK_DATA\" => []\n]"}}, "07f58e23abc62d97ada22fb0ba488e6d");

    </script>
@else
    <script src="{{asset('semantic-ui/semantic.min.js')}}"></script>
@endif

<script>
    $('#MenuButtonSideBar').click(function() {
        $('.ui.sidebar')
            .sidebar('toggle')
        ;
    });
</script>

