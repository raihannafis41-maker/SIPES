<nav class="main-header navbar navbar-expand navbar-white navbar-light">

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


    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">

            <a
                class="nav-link"
                data-toggle="dropdown"
                href="#"
            >

                <i class="fas fa-user-tie mr-1"></i>

                {{ auth()->user()->nama ?? 'Petugas' }}

            </a>


            <div class="dropdown-menu dropdown-menu-right">

                <span class="dropdown-item-text">

                    <strong>
                        Petugas
                    </strong>

                </span>

                <div class="dropdown-divider"></div>

                <a
                    href="#"
                    class="dropdown-item"
                >

                    <i class="fas fa-user mr-2"></i>

                    Profil

                </a>

                <div class="dropdown-divider"></div>

                <form
                    action="{{ route('logout.petugas') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="dropdown-item"
                    >

                        <i class="fas fa-sign-out-alt mr-2"></i>

                        Keluar

                    </button>

                </form>

            </div>

        </li>

    </ul>

</nav>