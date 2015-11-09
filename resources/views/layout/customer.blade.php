<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fit Platform</title>

    <link rel="stylesheet" href="{{ URL::to('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ URL::to('/bower_components/font-awesome/css/font-awesome.min.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ URL::to('/bower_components/AdminLTE/dist/css/skins/skin-green-light.min.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ URL::to('/bower_components/AdminLTE/dist/css/AdminLTE.min.css') }}" type="text/css" media="screen">

    @yield('inlineStyle')

</head>
<body>

@yield('content')

<script type="text/javascript" src="{{ URL::to('/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" href="{{ URL::to('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"> </script>
<script type="text/javascript" href="{{ URL::to('/bower_components/AdminLTE/dist/js/app.min.js') }}"> </script>

@yield('inlineScript')

@include('layout.revision')

</body>
</html>
