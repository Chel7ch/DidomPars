<body>

<nav class="navbar navbar-expand-md navbar-dark sticky-top bg-primary">
    <a class="navbar-brand" href="#">Rosetta</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

            @for($chr=65; $chr<=90;$chr++)
                @if(chr($chr) == $char)
                    {{--                    <li class='nav-item active'><a class='nav-link' href='english?alf={!!chr($chr)!!} '>--}}
                    {{--                            {!! chr($chr)!!} </a></li>--}}
                    <li class='nav-item active'><a class='nav-link' href="{{route('index', ['chr' => chr($chr)])}} ">
                            {!! chr($chr)!!} </a></li>
                @else
                    <li class='nav-item '><a class='nav-link' href="{{route('index', ['chr' => chr($chr)])}} ">
                            {!! chr($chr)!!} </a></li>
                @endif
            @endfor
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input type="text" class="form-control rounded-0" placeholder="Search" aria-label="Search"
                   aria-describedby="button-addon1">
            <button class="btn btn-dark btn-outline-secondary rounded-0 my-2 my-sm-0" type="button" id="button-addon1">
                <i class="bi-search" style="font-size: 1rem; color: white;"></i>
            </button>
        </form>

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link " data-toggle="dropdown" href="#">
                    <i class="bi-gear-fill" style="font-size: 2rem; color: white;"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">
    <div class="jumbotron">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it
            will remain fixed to the top of your browser’s viewport.</p>
        <a class="btn btn-lg btn-primary" href="../components/navbar/" role="button">View navbar docs &raquo;</a>
    </div>
</main>

</body>
</html>
