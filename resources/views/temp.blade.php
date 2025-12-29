<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>
</head>

<body>
    <div id="app">
        <div class="p5 m-5">
            <h2>This site is temporarily inactive due to an outstanding balance.<br />
                Please contact <a href="mailto:contact@seractive.com">contact@seractive.com</a> to resolve access.</h2>
        </div>
    </div>
</body>

</html>
