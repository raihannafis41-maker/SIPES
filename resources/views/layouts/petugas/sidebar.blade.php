<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- ========================================================= --}}
    {{-- LOGO --}}
    {{-- ========================================================= --}}

    <a
        href="{{ route('petugas.dashboard') }}"
        class="brand-link">

        <span class="brand-text font-weight-light">

            <strong>SIPES</strong>

        </span>

    </a>


    {{-- ========================================================= --}}
    {{-- SIDEBAR --}}
    {{-- ========================================================= --}}

    <div class="sidebar">

        {{-- ===================================================== --}}
        {{-- USER --}}
        {{-- ===================================================== --}}

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">

                <a href="#" class="d-block">

                    {{ auth()->user()->nama ?? 'Petugas' }}

                </a>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- MENU --}}
        {{-- ===================================================== --}}

        <nav class="mt-2">

            <ul
                class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">


                {{-- ================================================= --}}
                {{-- DASHBOARD --}}
                {{-- ================================================= --}}

                <li class="nav-item">

                    <a
                        href="{{ route('petugas.dashboard') }}"
                        class="nav-link {{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p>
                            Dashboard
                        </p>

                    </a>

                </li>


                {{-- ================================================= --}}
                {{-- DATA MASTER --}}
                {{-- ================================================= --}}

                <li class="nav-header">
                    DATA MASTER
                </li>


                {{-- SATUAN PENDIDIKAN --}}

                <li class="nav-item">

                    <a
                        href="{{ route('petugas.satuanpendidikan.index') }}"
                        class="nav-link {{ request()->routeIs('petugas.satuanpendidikan.*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-school"></i>

                        <p>
                            Satuan Pendidikan
                        </p>

                    </a>

                </li>


                {{-- ================================================= --}}
                {{-- MASA BERLAKU --}}
                {{-- ================================================= --}}

                <li class="nav-header">
                    MASA BERLAKU
                </li>


                {{-- DAFTAR MASA BERLAKU --}}
                <li class="nav-item">
                    <a
                        href="{{ route('petugas.masaberlaku.index') }}"
                        class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Masa Berlaku & Perpanjangan</p>
                    </a>
                </li>


                {{-- ================================================= --}}
                {{-- NOTIFIKASI --}}
                {{-- ================================================= --}}

                <li class="nav-header">
                    NOTIFIKASI
                </li>


                {{-- NOTIFIKASI --}}

                <li class="nav-item">

                    <a
                        href="#"
                        class="nav-link">

                        <i class="nav-icon fas fa-bell"></i>

                        <p>
                            Notifikasi
                        </p>

                    </a>

                </li>


                {{-- RIWAYAT NOTIFIKASI --}}

                <li class="nav-item">

                    <a
                        href="#"
                        class="nav-link">

                        <i class="nav-icon fas fa-history"></i>

                        <p>
                            Riwayat Notifikasi
                        </p>

                    </a>

                </li>


                {{-- ================================================= --}}
                {{-- LAPORAN --}}
                {{-- ================================================= --}}

                <li class="nav-header">
                    LAPORAN
                </li>


                <li class="nav-item">

                    <a
                        href="#"
                        class="nav-link">

                        <i class="nav-icon fas fa-file-alt"></i>

                        <p>
                            Laporan
                        </p>

                    </a>

                </li>


                {{-- ================================================= --}}
                {{-- AKUN --}}
                {{-- ================================================= --}}

                <li class="nav-header">
                    AKUN
                </li>


                {{-- PROFIL --}}

                <li class="nav-item">

                    <a
                        href="#"
                        class="nav-link">

                        <i class="nav-icon fas fa-user"></i>

                        <p>
                            Profil
                        </p>

                    </a>

                </li>


                {{-- ================================================= --}}
                {{-- KELUAR --}}
                {{-- ================================================= --}}

                <li class="nav-item">

                    <form
                        action="{{ route('logout.petugas') }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="nav-link btn btn-link text-left w-100"
                            style="border: none;">

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