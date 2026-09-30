@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('judul', 'Dashboard Administrator')


@section('content')


<!-- ================= KARTU INFORMASI ================= -->

<div class="row">


    <!-- JUMLAH USER -->

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>
                    {{ $jumlahUser }}
                </h3>

                <p>
                    Jumlah User
                </p>

            </div>

            <div class="icon">

                <i class="fas fa-users"></i>

            </div>

        </div>

    </div>


    <!-- ADMIN -->

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>
                    {{ $jumlahAdmin }}
                </h3>

                <p>
                    Administrator
                </p>

            </div>

            <div class="icon">

                <i class="fas fa-user-shield"></i>

            </div>

        </div>

    </div>


    <!-- PETUGAS -->

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>
                    {{ $jumlahPetugas }}
                </h3>

                <p>
                    Petugas
                </p>

            </div>

            <div class="icon">

                <i class="fas fa-user-tie"></i>

            </div>

        </div>

    </div>


    <!-- SATUAN PENDIDIKAN -->

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>
                    {{ $jumlahSatuanPendidikan }}
                </h3>

                <p>
                    Satuan Pendidikan
                </p>

            </div>

            <div class="icon">

                <i class="fas fa-school"></i>

            </div>

        </div>

    </div>

</div>


<!-- ================= STATUS MASA BERLAKU ================= -->

<div class="row">


    <!-- AKTIF -->

    <div class="col-lg-4">

        <div class="info-box">

            <span class="info-box-icon bg-success">

                <i class="fas fa-check-circle"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Satuan Pendidikan Aktif
                </span>

                <span class="info-box-number">
                    {{ $jumlahAktif }}
                </span>

            </div>

        </div>

    </div>


    <!-- SEGERA BERAKHIR -->

    <div class="col-lg-4">

        <div class="info-box">

            <span class="info-box-icon bg-warning">

                <i class="fas fa-exclamation-triangle"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Segera Berakhir
                </span>

                <span class="info-box-number">
                    {{ $jumlahSegeraBerakhir }}
                </span>

            </div>

        </div>

    </div>


    <!-- SUDAH BERAKHIR -->

    <div class="col-lg-4">

        <div class="info-box">

            <span class="info-box-icon bg-danger">

                <i class="fas fa-times-circle"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Sudah Berakhir
                </span>

                <span class="info-box-number">
                    {{ $jumlahSudahBerakhir }}
                </span>

            </div>

        </div>

    </div>

</div>


<!-- ================= NOTIFIKASI ================= -->

<div class="row">

    <div class="col-md-6">

        <div class="card card-primary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-bell mr-1"></i>

                    Notifikasi

                </h3>

            </div>


            <div class="card-body text-center">

                <h2 class="text-primary">

                    {{ $jumlahNotifikasiTerkirim }}

                </h2>

                <p class="text-muted mb-0">

                    Notifikasi berhasil terkirim

                </p>

            </div>

        </div>

    </div>


    <div class="col-md-6">

        <div class="card card-success card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-info-circle mr-1"></i>

                    Informasi SIPES

                </h3>

            </div>


            <div class="card-body">

                Sistem digunakan untuk mengelola
                masa berlaku satuan pendidikan,
                perpanjangan, notifikasi, dan laporan.

            </div>

        </div>

    </div>

</div>


@endsection