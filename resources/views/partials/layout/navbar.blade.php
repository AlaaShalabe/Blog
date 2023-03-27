<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">category</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        new
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('post.create') }}">post</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.create') }}">category</a></li>
                        <li><a class="dropdown-item" href="{{ route('tag.create') }}">tag</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="buttons">
            @guest
                <a class="button is-primary" href="{{ route('login') }}">
                    <strong>Login</strong>
                </a>
                <a class="button is-primary" href="{{ route('signUp') }}">
                    <strong>SingUp</strong>
                </a>
            @endguest
            @auth
                <div class="navbar-item"> {{ __('Hello') }} {{ Auth::User()->name }}!</div>
                <form action="{{ route('logOut') }}" method="POST">
                    @csrf
                    <button type="submit" class="button is-primary">
                        Logout
                    </button>
                    {{-- <button type="submit" class="button is-denger">
                    <a href="{{ route('mails') }}">E-mails</a>
                  </button> --}}
                </form>
            @endauth


        </div>
    </div>
</nav>
