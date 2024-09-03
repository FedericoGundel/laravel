<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('index') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('assets/images/logo-bg-white.png') }}" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('assets/images/logo-bg-white.png') }}" alt="" height="50"> <span
                            class="logo-txt">Vuesy</span>
                    </span>
                </a>

                <a href="{{ url('index') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('assets/images/logo-bg-white.png') }}" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('assets/images/logo-bg-white2.png') }}" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm text-dark px-0 font-size-16 d-lg-none header-item"
                data-bs-toggle="collapse" id="horimenu-btn" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="topnav">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            @can('inicio')
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{ url('index') }}"
                                    id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-home-circle icon"></i>
                                    <span data-key="t-dashboard">Inicio</span>
                                </a>
                            </li>
                            @endcan

                            @can('miembros')
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{url('miembros')}}"
                                    id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-user icon"></i>
                                    <span data-key="t-dashboard">Miembros</span>
                                </a>
                            </li>
                            @endcan


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                                    <i class="bx bxl-product-hunt icon"></i>
                                    <span data-key="t-apps">Productos</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    @can('crear-producto')
                                    <a href="{{url('crear-pr')}}oducto" class="dropdown-item"
                                        data-key="t-calendar">Crear
                                        producto</a>
                                    @endcan
                                    @can('productos-recibidos')
                                    <a href="{{url('producto')}}s-recibidos" class="dropdown-item"
                                        data-key="t-chat">Productos
                                        recibidos</a>
                                    @endcan
                                    @can('almacenes')
                                    <a href="{{url('almacene')}}s" class="dropdown-item" data-key="t-chat">Almacenes</a>
                                    @endcan
                                    @can('historial')
                                    <a href="{{url('historia')}}l" class="dropdown-item" data-key="t-chat">Historial</a>
                                    @endcan
                                    @can('anomalias')
                                    <a href="{{url('anomalia')}}s" class="dropdown-item" data-key="t-chat">Anomalías</a>
                                    @endcan
                                </div>
                            </li>



                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                                    <i class="bx bx-basket icon"></i>
                                    <span data-key="t-apps">Pedidos</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    @can('crear-pedido')
                                    <a href="{{url('crear-pe')}}dido" class="dropdown-item" data-key="t-calendar">Crear
                                        pedido</a>
                                    @endcan
                                    @can('historial-pedidos')
                                    <a href="{{url('historia')}}l-pedidos" class="dropdown-item"
                                        data-key="t-chat">Historial</a>
                                    @endcan
                                </div>
                            </li>

                        </ul>

                    </div>
                </nav>
            </div>

        </div>

        <div class="d-flex">


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="img_user2" class="rounded-circle header-profile-user"
                        src="/assets/images/profile_images/{{ (Auth::user()->profile_image != 0) ? Auth::user()->id . '.png' : 'default.svg' }}"
                        alt="Header Avatar">

                    <span class="ms-2 d-xl-inline-block user-item-desc">
                        <span class="user-name">{{ Auth::user()->username }}<i class="mdi mdi-chevron-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">

                    <a class="dropdown-item" href="/perfil/{{ Auth::user()->id }}"><i
                            class="bx bx-user-circle text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Perfil</span></a>
                    <a class="dropdown-item" href="{{ url('admision') }}"><i
                            class="mdi mdi-account-question-outline text-muted font-size-16 align-middle me-1"></i>
                        <span class="align-middle">Admisión</span></a>

                    <div class="dropdown-divider my-0"></div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                        <button type="submit" class="dropdown-item" href="{{ url('auth-signout-cover') }}"><i
                                class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                                class="align-middle">Cerrar sesión</span></button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- end dash troggle-icon -->

</header>

<div class="hori-overlay"></div>