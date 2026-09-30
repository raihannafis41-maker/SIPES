<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'Satuan Pendidikan') | SIPES
    </title>

    <link rel="stylesheet"
          href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('dist/css/adminlte.min.css') }}">

    @stack('style')

</head>


<body class="hold-transition layout-top-nav">

<div class="wrapper">


    <!-- NAVBAR -->

    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

        <div class="container-fluid">


            <a href="{{ route('satuanpendidikan.dashboard') }}"
               class="navbar-brand">

                <span class="brand-text font-weight-bold">
                    SIPES
                </span>

            </a>


            <button
                class="navbar-toggler order-1"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSatuanPendidikan"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            <div
                class="collapse navbar-collapse order-3"
                id="navbarSatuanPendidikan"
            >

                <ul class="navbar-nav">


                    <li class="nav-item">

                        <a
                            href="{{ route('satuanpendidikan.dashboard') }}"
                            class="nav-link"
                        >

                            <i class="fas fa-tachometer-alt mr-1"></i>

                            Dashboard

                        </a>

                    </li>


                    <li class="nav-item">

                        <a href="#"
                           class="nav-link">

                            <i class="fas fa-school mr-1"></i>

                            Profil

                        </a>

                    </li>


                    <li class="nav-item">

                        <a href="#"
                           class="nav-link">

                            <i class="fas fa-calendar-alt mr-1"></i>

                            Masa Berlaku

                        </a>

                    </li>


                    <li class="nav-item">

                        <a href="#"
                           class="nav-link">

                            <i class="fas fa-history mr-1"></i>

                            Riwayat

                        </a>

                    </li>


                    <li class="nav-item">

                        <a href="#"
                           class="nav-link">

                            <i class="fas fa-bell mr-1"></i>

                            Notifikasi

                        </a>

                    </li>

                </ul>


                <!-- KELUAR -->

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">

                        <form
                            action="{{ route('logout.satuanpendidikan') }}"
                            method="POST"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-link nav-link text-danger"
                            >

                                <i class="fas fa-sign-out-alt mr-1"></i>

                                Keluar

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- CONTENT -->

    <div class="content-wrapper">


        <div class="content-header">

            <div class="container-fluid">

                <h1 class="m-0">

                    @yield(
                        'judul',
                        'Dashboard Satuan Pendidikan'
                    )

                </h1>

            </div>

        </div>


        <section class="content">

            <div class="container-fluid">


                @if(session('success'))

                    <div class="alert alert-success alert-dismissible">

                        <button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                        >
                            ×
                        </button>

                        {{ session('success') }}

                    </div>

                @endif


                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible">

                        <button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                        >
                            ×
                        </button>

                        {{ session('error') }}

                    </div>

                @endif


                @yield('content')

            </div>

        </section>

    </div>


    <!-- FOOTER -->

    <footer class="main-footer">

        <div class="text-center">

            <strong>
                SIPES
            </strong>

            &copy; {{ date('Y') }}

            <br>

            Sistem Informasi Masa Berlaku Satuan Pendidikan

        </div>

    </footer>

</div>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@stack('script')

</body>

</html>