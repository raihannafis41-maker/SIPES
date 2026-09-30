<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- LOGO --}}
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">
            <strong>SIPES</strong>
        </span>
    </a>

    <div class="sidebar">

        {{-- INFORMASI PENGGUNA --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                <i class="fas fa-user-circle fa-2x text-white"></i>
            </div>

            <div class="info">
                <a href="#" class="d-block">
                    {{ Auth::user()->nama ?? 'Administrator' }}
                </a>
            </div>

        </div>


        {{-- MENU --}}
        <nav class="mt-2">

            <ul
                class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                {{-- DASHBOARD --}}
                <li class="nav-item">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p>
                            Dashboard
                        </p>

                    </a>

                </li>


                {{-- DATA MASTER --}}
                <li class="nav-header">
                    DATA MASTER
                </li>


                {{-- USER --}}
                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-users"></i>

                        <p>
                            User
                        </p>

                    </a>

                </li>


                {{-- SATUAN PENDIDIKAN --}}
                <li class="nav-item">

                    <a
                        href="{{ route('admin.satuanpendidikan.index') }}"
                        class="nav-link {{ request()->routeIs('admin.satuanpendidikan.*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-school"></i>

                        <p>
                            Satuan Pendidikan
                        </p>

                    </a>

                </li>


                {{-- MASA BERLAKU --}}
                <li class="nav-header">
                    MASA BERLAKU
                </li>


                <a
                    href="{{ route('admin.masaberlaku.index') }}"
                    class="nav-link {{ request()->routeIs('admin.masaberlaku.*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar-alt"></i>

                    <p>
                        Masa Berlaku
                    </p>
                </a>


                {{-- NOTIFIKASI --}}
                <li class="nav-header">
                    NOTIFIKASI
                </li>


                <li class="nav-item">

                    
                    <a
                        href="{{ route('admin.notifikasi.index') }}"
                        class="nav-link {{ request()->routeIs('admin.notifikasi.*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-bell"></i>

                        <p>
                            Notifikasi
                        </p>

                    </a>

                </li>

                {{-- LAPORAN --}}
                <li class="nav-header">
                    LAPORAN
                </li>


                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-file-alt"></i>

                        <p>
                            Laporan
                        </p>
                        

                    </a>

                </li>


                {{-- AKUN --}}
                <li class="nav-header">
                    AKUN
                </li>


                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-user"></i>

                        <p>
                            Profil
                        </p>

                    </a>

                </li>


                {{-- KELUAR --}}
                <li class="nav-item">

                    <form
                        action="{{ route('logout.admin') }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="nav-link btn btn-link text-left w-100">

                            <i class="nav-icon fas fa-sign-out-alt"></i>

                            <p>
                                Keluar
                            </p>

                        </button>

                    </form>

                </li>

            </ul>

        </nav>

    </div>

</aside>