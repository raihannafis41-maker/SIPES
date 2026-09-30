<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        Masuk Admin | SIPES
    </title>

    <link rel="stylesheet"
          href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('dist/css/adminlte.min.css') }}">

</head>


<body class="hold-transition login-page">


<div class="login-box">

    <div class="card card-outline card-primary">


        <!-- JUDUL -->

        <div class="card-header text-center">

            <a href="{{ route('landing') }}"
               class="h1">

                <b>SIPES</b>

            </a>

            <p class="text-muted mb-0">
                Administrator
            </p>

        </div>


        <!-- FORM -->

        <div class="card-body">


            <p class="login-box-msg">

                Silakan masuk untuk melanjutkan

            </p>


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
                action="{{ route('login.admin.proses') }}"
                method="POST"
            >

                @csrf


                <!-- USERNAME -->

                <div class="input-group mb-3">

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Username"
                        value="{{ old('username') }}"
                        required
                        autofocus
                    >

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-user"></span>

                        </div>

                    </div>

                </div>


                <!-- PASSWORD -->

                <div class="input-group mb-3">

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Kata Sandi"
                        required
                    >

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-lock"></span>

                        </div>

                    </div>

                </div>


                <!-- TOMBOL -->

                <div class="row">

                    <div class="col-12">

                        <button
                            type="submit"
                            class="btn btn-primary btn-block"
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