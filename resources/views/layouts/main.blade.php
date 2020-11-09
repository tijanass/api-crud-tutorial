<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: #ead0d4;
        }
    </style>
</head>
<body>
@include('partials.navbar')

<div id="app">
    @yield('content')
</div>

@include('partials.footer')
</body>
</html>
