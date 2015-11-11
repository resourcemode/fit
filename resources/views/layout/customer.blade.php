<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.header')
</head>
<body class="hold-transition skin-purple-light fixed">

<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
    <header class="main-header">
        @include('layout.menu')
    </header>

    <aside class="main-sidebar">
        @include('layout.sidebar')
    </aside>

    <div class="content-wrapper">
        @include('layout.breadcrumb')
        @yield('content')
    </div>

    <footer class="main-footer">
        @include('layout.footer')
    </footer>

    @include('layout.revision')
</div>
<!-- /.content-wrapper -->

@include('layout.jsscripts')
@yield('inlineScript')

</body>
</html>
