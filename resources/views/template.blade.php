<html>
    <head>

        <title>Teste</title>

    <link href = {{ asset("css/app.css") }} rel="stylesheet" />



    </head>
    <body>
        @yield('container')
    </body>

<script type="text/JavaScript" src="{{ asset("jqueryDatePicker/external/jquery/jquery.js")}}"></script>
<script type="text/JavaScript" src="{{ asset("jqueryDatePicker/jquery-ui.min.js")}}"></script>

    @yield('script')
</html>
