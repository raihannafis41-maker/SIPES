<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- Tombol Sidebar --}}

    <ul class="navbar-nav">

        <li class="nav-item">

            <a
                class="nav-link"
                data-widget="pushmenu"
                href="#"
                role="button"
            >

                <i class="fas fa-bars"></i>

            </a>

        </li>

    </ul>


    {{-- Menu kanan --}}

    <ul class="navbar-nav ml-auto">

        {{-- Informasi Admin --}}

        <li class="nav-item dropdown">

            <a
                class="nav-link"
                data-toggle="dropdown"
                href="#"
            >

                <i class="fas fa-user-shield"></i>

                <span class="ml-1">
                    {{ Auth::user()->nama ?? 'Administrator' }}
                </span>

            </a>


            <div class="dropdown-menu dropdown-menu-right">

                <span class="dropdown-item dropdown-header">

                    <i class="fas fa-user-shield mr-2"></i>

                    Administrator

                </span>

                <div class="dropdown-divider"></div>


                {{-- Profil --}}

                <a href="#" class="dropdown-item">

                    <i class="fas fa-user mr-2"></i>

                    Profil

                </a>


                <div class="dropdown-divider"></div>


                {{-- Keluar --}}

                <form
                    action="{{ route('logout.admin') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="dropdown-item text-danger"
                    >

                        <i class="fas fa-sign-out-alt mr-2"></i>

                        Keluar

                    </button>

                </form>

            </div>

        </li>

    </ul>

</nav>