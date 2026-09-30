<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        Masuk Satuan Pendidikan | SIPES
    </title>

    <link rel="stylesheet"
          href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('dist/css/adminlte.min.css') }}">

</head>


<body class="hold-transition login-page">


<div class="login-box">

    <div class="card card-outline card-purple">


        <!-- JUDUL -->

        <div class="card-header text-center">

            <a href="{{ route('landing') }}"
               class="h1">

                <b>SIPES</b>

            </a>

            <p class="text-muted mb-0">
                Satuan Pendidikan
            </p>

        </div>


        <div class="card-body">


            <p class="login-box-msg">

                Masuk menggunakan NPSN

            </p>


            <!-- INFORMASI -->

            <div class="callout callout-info">

                <h5>

                    <i class="fas fa-info-circle mr-1"></i>

                    Informasi

                </h5>

                <p class="mb-0">

                    Masukkan NPSN yang terdaftar pada
                    satuan pendidikan.

                </p>

            </div>


            @if(session('error'))

                <div class="alert alert-danger">

                    <i class="fas fa-exclamation-circle mr-1"></i>

                    {{ session('error') }}

                </div>

            @endif


            @if($errors->any())

                <div class="alert alert-danger">

                    {{ $errors->first() }}

                </div>

            @endif


            <form
                action="{{ route('login.satuanpendidikan.proses') }}"
                method="POST"
            >

                @csrf


                <!-- NPSN -->

                <div class="input-group mb-3">

                    <input
                        type="text"
                        name="npsn"
                        class="form-control"
                        placeholder="NPSN 8 angka"
                        value="{{ old('npsn') }}"
                        maxlength="8"
                        minlength="8"
                        inputmode="numeric"
                        pattern="[0-9]{8}"
                        required
                        autofocus
                    >

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-school"></span>

                        </div>

                    </div>

                </div>


                <!-- TOMBOL -->

                <div class="row">

                    <div class="col-12">

                        <button
                            type="submit"
                            class="btn btn-purple btn-block"
                        >

                            <i class="fas fa-sign-in-alt mr-1"></i>

                            Masuk

                        </button>

                    </div>

                </div>

            </form>


            <p class="mt-3 mb-0 text-center">

                <a href="{{ route('landing') }}">

                    <i class="fas fa-arrow-left mr-1"></i>

                    Kembali ke halaman utama

                </a>

            </p>

        </div>

    </div>

</div>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>