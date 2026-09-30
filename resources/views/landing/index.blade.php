<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        SIPES - Sistem Informasi Masa Berlaku Satuan Pendidikan
    </title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE -->
    <link rel="stylesheet"
          href="{{ asset('dist/css/adminlte.min.css') }}">

</head>


<body class="hold-transition layout-top-nav">


<div class="wrapper">


    <!-- ================= NAVBAR ================= -->

    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

        <div class="container">

            <a href="{{ route('landing') }}"
               class="navbar-brand">

                <span class="brand-text font-weight-bold text-primary">
                    SIPES
                </span>

            </a>


            <button
                class="navbar-toggler order-1"
                type="button"
                data-toggle="collapse"
                data-target="#menuUtama"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            <div
                class="collapse navbar-collapse order-3"
                id="menuUtama"
            >

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">

                        <a
                            href="{{ route('login.admin') }}"
                            class="nav-link"
                        >

                            <i class="fas fa-user-shield mr-1"></i>

                            Administrator

                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            href="{{ route('login.petugas') }}"
                            class="nav-link"
                        >

                            <i class="fas fa-user-tie mr-1"></i>

                            Petugas

                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            href="{{ route('login.satuanpendidikan') }}"
                            class="nav-link"
                        >

                            <i class="fas fa-school mr-1"></i>

                            Satuan Pendidikan

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- ================= KONTEN ================= -->

    <div class="content-wrapper">


        <section class="content">

            <div class="container py-5">


                <!-- JUDUL -->

                <div class="row justify-content-center">

                    <div class="col-lg-9 text-center">

                        <div class="mb-4">

                            <i
                                class="fas fa-school text-primary"
                                style="font-size: 70px;"
                            ></i>

                        </div>


                        <h1 class="font-weight-bold">

                            SIPES

                        </h1>


                        <h4 class="text-muted">

                            Sistem Informasi Masa Berlaku
                            Satuan Pendidikan

                        </h4>


                        <p class="text-muted mt-3">

                            Sistem informasi untuk membantu
                            pengelolaan data satuan pendidikan,
                            masa berlaku, perpanjangan,
                            notifikasi, dan laporan.

                        </p>

                    </div>

                </div>


                <!-- ================= PILIH AKSES ================= -->

                <div class="row mt-5">


                    <!-- ADMIN -->

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card card-primary card-outline h-100">

                            <div class="card-body text-center">

                                <div class="mb-3">

                                    <i
                                        class="fas fa-user-shield text-primary"
                                        style="font-size: 50px;"
                                    ></i>

                                </div>


                                <h4>

                                    Administrator

                                </h4>


                                <p class="text-muted">

                                    Mengelola pengguna,
                                    satuan pendidikan,
                                    masa berlaku,
                                    notifikasi, dan laporan.

                                </p>


                                <a
                                    href="{{ route('login.admin') }}"
                                    class="btn btn-primary"
                                >

                                    <i class="fas fa-sign-in-alt mr-1"></i>

                                    Masuk Administrator

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- PETUGAS -->

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card card-success card-outline h-100">

                            <div class="card-body text-center">

                                <div class="mb-3">

                                    <i
                                        class="fas fa-user-tie text-success"
                                        style="font-size: 50px;"
                                    ></i>

                                </div>


                                <h4>

                                    Petugas

                                </h4>


                                <p class="text-muted">

                                    Mengelola data satuan pendidikan,
                                    masa berlaku, notifikasi,
                                    dan laporan.

                                </p>


                                <a
                                    href="{{ route('login.petugas') }}"
                                    class="btn btn-success"
                                >

                                    <i class="fas fa-sign-in-alt mr-1"></i>

                                    Masuk Petugas

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- SATUAN PENDIDIKAN -->

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card card-info card-outline h-100">

                            <div class="card-body text-center">

                                <div class="mb-3">

                                    <i
                                        class="fas fa-school text-info"
                                        style="font-size: 50px;"
                                    ></i>

                                </div>


                                <h4>

                                    Satuan Pendidikan

                                </h4>


                                <p class="text-muted">

                                    Melihat informasi satuan pendidikan,
                                    masa berlaku, riwayat, dan notifikasi
                                    menggunakan NPSN.

                                </p>


                                <a
                                    href="{{ route('login.satuanpendidikan') }}"
                                    class="btn btn-info"
                                >

                                    <i class="fas fa-sign-in-alt mr-1"></i>

                                    Masuk dengan NPSN

                                </a>

                            </div>

                        </div>

                    </div>


                </div>


                <!-- INFORMASI -->

                <div class="row mt-3">

                    <div class="col-12">

                        <div class="callout callout-info">

                            <h5>

                                <i class="fas fa-info-circle mr-1"></i>

                                Tentang SIPES

                            </h5>

                            <p class="mb-0">

                                SIPES digunakan untuk membantu
                                pengelolaan masa berlaku data
                                satuan pendidikan secara terpusat.

                            </p>

                        </div>

                    </div>

                </div>


            </div>

        </section>

    </div>


    <!-- ================= FOOTER ================= -->

    <footer class="main-footer text-center">

        <strong>
            SIPES
        </strong>

        &copy; {{ date('Y') }}

        <br>

        Sistem Informasi Masa Berlaku Satuan Pendidikan

    </footer>


</div>


<!-- jQuery -->

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE -->

<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>