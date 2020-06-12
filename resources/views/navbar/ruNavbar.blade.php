<body>
{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
        <ul class="navbar-nav ">
            @php
                for( $chr=1040; $chr<=1071;$chr++){
                   if( mb_chr($chr) == $char) echo "<li class='nav-item active' ><a class='nav-link' href='russian?alf="
                   . mb_chr($chr) . "'>" . mb_chr($chr) . "</a></li>";

                   else
                       echo "<li class='nav-item ' ><a class='nav-link' href='russian?alf=" . mb_chr($chr). "'>"
                   . mb_chr($chr) . "</a></li>";
                }
            @endphp
        </ul>
    </div>

    <form class="form-inline ">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                link
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
    </ul>
</nav>
