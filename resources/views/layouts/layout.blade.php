<!doctype html>
<html>
<head>
    @include('include.head')
</head>
<body>
<nav class="navbar navbar-light nav-color">
    <span class="navbar-brand mb-0 h1"><i class="fa fa-google"></i> Calendar</span>
</nav>
<div class="container pt-5">
    @yield('content')
    <footer class="row">
        @include('include.footer')
    </footer>
</div>
</body>
