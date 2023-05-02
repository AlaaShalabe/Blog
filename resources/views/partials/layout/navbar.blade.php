<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">Blog</a>
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
                    <a class="nav-link active" aria-current="page" href="{{ route('categories') }}">Categoreis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('tags') }}">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Language
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lang/en">English</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lang/ar">Arabic</a>
                    </li>
                </ul>
            </div>
        </div>
        <div>
        </div>
        <div class="buttons">
            @guest
                <a class="button is-link" href="{{ route('login') }}">
                    <strong>Login</strong>
                </a>
                <a class="button is-link" href="{{ route('signUp') }}">
                    <strong>SingUp</strong>
                </a>
            @endguest
            @auth
                <div class="navbar-item"> {{ __('Hello') }} {{ Auth::User()->name }}!</div>
                <form action="{{ route('logOut') }}" method="POST">
                    @csrf
                    <button type="submit" class="button is-link">
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
