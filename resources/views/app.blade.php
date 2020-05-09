  @include('header.head')
  @include('navbar.navbar')

<body>
	@section('sidebar')
            sidebar.
    @show

	<div class="container">
	  @yield('content')
	</div>

	@yield('footer')
</body>
</html>