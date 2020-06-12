@include('header.head')
{{--@include('navbar.enNavbar')--}}

<body>
{{--@section('sidebar')--}}
{{--    sidebar.--}}
{{--@show--}}

<div class="container">
    @yield('content')
</div>

@yield('footer')
</body>
</html>
