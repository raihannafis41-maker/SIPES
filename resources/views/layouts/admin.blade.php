
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        SIPES -
        @yield('title', 'Dashboard')
    </title>

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"
    >

    {{-- AdminLTE --}}
    <link
        rel="stylesheet"
        href="{{ asset('dist/css/adminlte.min.css') }}"
    >

    @stack('style')

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{-- NAVBAR --}}
    @include('layouts.admin.navbar')

    {{-- SIDEBAR --}}
    @include('layouts.admin.sidebar')

    {{-- CONTENT --}}
    <div class="content-wrapper">

        {{-- JUDUL HALAMAN --}}
        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1 class="m-0">
                            @yield('judul')
                        </h1>

                    </div>

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    Dashboard
                                </a>
                            </li>

                            <li class="breadcrumb-item active">
                                @yield('judul')
                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>

        {{-- ISI HALAMAN --}}
        <section class="content">

            <div class="container-fluid">

                {{-- PESAN SUKSES --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        <button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                        >
                            <span>&times;</span>
                        </button>

                        {{ session('success') }}

                    </div>

                @endif

                {{-- PESAN ERROR --}}
                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show">

                        <button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                        >
                            <span>&times;</span>
                        </button>

                        {{ session('error') }}

                    </div>

                @endif

                @yield('content')

            </div>

        </section>

    </div>

    {{-- FOOTER --}}
    @include('layouts.admin.footer')

</div>

{{-- jQuery --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

{{-- Bootstrap --}}
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{-- AdminLTE --}}
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@stack('script')

</body>

</html>
```
