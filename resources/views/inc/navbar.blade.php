<nav class="navbar navbar-expand-md navbar-white bg-white border-bottom sticky-top" id="navbar">
    <div class="container">
        <a href="{{ URL('/') }}" class="navbar-brand">
            OportunidadesBcc
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-2 d-none d-lg-inline">
                    <a class="nav-link mt-2" href="{{ URL('/bolsas') }}">Bolsas</a>
                </li>
                <li class="nav-item mr-2 d-none d-lg-inline">
                    <a class="nav-link mt-2" href="{{ URL('/intercambios') }}">Intercambios</a>
                </li>
                <li class="nav-item mr-2 d-none d-lg-inline">
                    <a class="nav-link mt-2" href="{{ URL('/eventos') }}">Eventos</a>
                </li>
                @auth
                    <li class="nav-item dropdown dropdown-left">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="">{{ auth()->user()->name }}</span>
                            <img class="img-profile rounded-circle" src="{{ asset('images/user-profile.png') }}"
                                width="40px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            @role('admin')
                                <a class="dropdown-item" href="{{ route('account.dashboard') }}"> <i
                                        class="fas fa-cogs fa-sm "></i> Dashboard</a>
                            @endrole
                            @role('author')
                                <a class="dropdown-item" href="{{ route('account.authorSection') }}"> <i
                                        class="fa fa-cogs fa-sm "></i> Dashboard Autor </a>
                            @endrole
                            <a class="dropdown-item" href="{{ route('account.index') }}"> <i class="fas fa-user fa-sm "></i>
                                Perfil </a>
                            <a class="dropdown-item" href="{{ route('account.changePassword') }}"> <i
                                    class="fas fa-key fa-sm "></i> Trocar Senha </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('account.logout') }}">
                                <i class="fas fa-sign-out-alt"></i>
                                Sair
                            </a>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>

</nav>
