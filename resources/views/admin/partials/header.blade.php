<header class="bg-dark">
    <nav class="navbar navbar-expand-md navbar-dark py-3">
        <div class="container-fluid px-5">
            <a class="navbar-brand d-flex align-items-center" href="{{route('admin.home')}}">
                BOOLFOLIO
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Vai al sito</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.settings')}}">Impostazioni</a>
                        </li>
                    @endauth

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                        <li class="nav-item">
                            <form
                                action="{{route('admin.works.index')}}"
                                class="d-flex works_searchbar me-5"
                                method="GET"
                            >
                                <input type="text" name="search" placeholder="Cerca Work">
                                <button class="p-1"><i class="fa-solid fa-magnifying-glass ps-2"></i></button>
                            </form>
                        </li>

                        <li class="nav-item text-white me-3 d-flex align-items-center">
                            <i class="fa-regular fa-user pe-2"></i>
                            <span class="text-uppercase">{{Auth::user()->name}}</span>
                        </li>

                        <li class="nav-item d-flex align-items-center">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-light" type="submit"><i class=" ms-1 fa-solid fa-arrow-right-from-bracket"></i></button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

</header>
