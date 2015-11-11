<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.header')
</head>
<body class="skin-green-light">

<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
    <header class="main-header">
        @include('layout.menu')
    </header>

    <aside class="main-sidebar">
        @include('layout.sidebar')
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
        @include('layout.footer')
    </footer>

    @include('layout.revision')
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="{{ URL::to('/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" href="{{ URL::to('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"> </script>
<script type="text/javascript" href="{{ URL::to('/bower_components/AdminLTE/dist/js/app.min.js') }}"> </script>
@yield('inlineScript')

<!-- This is only necessary if you do Flash::overlay('...') -->
<script>
    $('#flash-overlay-modal').modal();
</script>

</body>
</html>
