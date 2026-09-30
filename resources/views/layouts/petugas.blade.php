<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        @yield('title', 'Petugas') | SIPES
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('dist/css/adminlte.min.css') }}"
    >

    @stack('style')

</head>


<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">


    {{-- NAVBAR --}}

    @include('layouts.petugas.navbar')


    {{-- SIDEBAR --}}

    @include('layouts.petugas.sidebar')


    {{-- CONTENT --}}

    <div class="content-wrapper">

        <div class="content-header">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-sm-6">

                        <h1 class="m-0">

                            @yield(
                                'judul',
                                'Dashboard Petugas'
                            )

                        </h1>

                    </div>

                </div>

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


    {{-- FOOTER --}}

    @include('layouts.petugas.footer')


</div>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@stack('script')

</body>

</html>