@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('judul', 'Dashboard Petugas')

@section('content')

{{-- ========================================================= --}}
{{-- INFORMASI UTAMA --}}
{{-- ========================================================= --}}

<div class="row">

    {{-- TOTAL SATUAN PENDIDIKAN --}}
    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-primary">

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


    {{-- MASIH BERLAKU --}}
    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>
                    {{ $jumlahAktif }}
                </h3>

                <p>
                    Masih Berlaku
                </p>

            </div>

            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>

        </div>

    </div>


    {{-- SEGERA BERAKHIR --}}
    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>
                    {{ $jumlahSegeraBerakhir }}
                </h3>

                <p>
                    Segera Berakhir
                </p>

            </div>

            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>

        </div>

    </div>


    {{-- SUDAH BERAKHIR --}}
    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>
                    {{ $jumlahSudahBerakhir }}
                </h3>

                <p>
                    Sudah Berakhir
                </p>

            </div>

            <div class="icon">
                <i class="fas fa-times-circle"></i>
            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- PERLU PERHATIAN --}}
{{-- ========================================================= --}}

<div class="row">

    {{-- TANPA WHATSAPP --}}
    <div class="col-lg-4 col-md-6">

        <div class="info-box">

            <span class="info-box-icon bg-secondary">

                <i class="fas fa-phone-slash"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Tanpa WhatsApp
                </span>

                <span class="info-box-number">

                    {{ $jumlahTanpaWhatsApp }}

                </span>

            </div>

        </div>

    </div>


    {{-- NOTIFIKASI MENUNGGU --}}
    <div class="col-lg-4 col-md-6">

        <div class="info-box">

            <span class="info-box-icon bg-warning">

                <i class="fas fa-clock"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Notifikasi Menunggu
                </span>

                <span class="info-box-number">

                    {{ $jumlahNotifikasiMenunggu }}

                </span>

            </div>

        </div>

    </div>


    {{-- NOTIFIKASI GAGAL --}}
    <div class="col-lg-4 col-md-6">

        <div class="info-box">

            <span class="info-box-icon bg-danger">

                <i class="fas fa-times"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Notifikasi Gagal
                </span>

                <span class="info-box-number">

                    {{ $jumlahNotifikasiGagal }}

                </span>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- MASA BERLAKU TERDEKAT --}}
{{-- ========================================================= --}}

<div class="row">

    <div class="col-md-8">

        <div class="card card-warning card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-calendar-alt mr-1"></i>

                    Masa Berlaku Terdekat

                </h3>

                <div class="card-tools">

                    <a
                        href="#"
                        class="btn btn-sm btn-warning"
                    >

                        Lihat Semua

                    </a>

                </div>

            </div>


            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th>
                                    NPSN
                                </th>

                                <th>
                                    Satuan Pendidikan
                                </th>

                                <th>
                                    Berakhir
                                </th>

                                <th>
                                    Status
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse(
                                $masaBerlakuTerdekat
                                as $satuanPendidikan
                            )

                                @php

                                    $hari = now()
                                        ->startOfDay()
                                        ->diffInDays(
                                            $satuanPendidikan->tanggalberakhir,
                                            false
                                        );

                                @endphp

                                <tr>

                                    <td>
                                        {{ $satuanPendidikan->npsn }}
                                    </td>

                                    <td>

                                        <strong>
                                            {{ $satuanPendidikan->nama }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">

                                            {{ $satuanPendidikan->jenis }}

                                        </small>

                                    </td>

                                    <td>

                                        {{ $satuanPendidikan->tanggalberakhir
                                            ? $satuanPendidikan->tanggalberakhir->format('d-m-Y')
                                            : '-' }}

                                    </td>

                                    <td>

                                        @if($hari < 0)

                                            <span class="badge badge-danger">

                                                Sudah Berakhir

                                            </span>

                                        @elseif($hari <= 30)

                                            <span class="badge badge-warning">

                                                Segera Berakhir

                                            </span>

                                        @else

                                            <span class="badge badge-success">

                                                Masih Berlaku

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="4"
                                        class="text-center text-muted"
                                    >

                                        Belum ada data masa berlaku.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    {{-- RINGKASAN NOTIFIKASI --}}

    <div class="col-md-4">

        <div class="card card-primary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-bell mr-1"></i>

                    Ringkasan Notifikasi

                </h3>

            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between mb-3">

                    <span>
                        Terkirim
                    </span>

                    <strong class="text-success">

                        {{ $jumlahNotifikasiTerkirim }}

                    </strong>

                </div>


                <div class="d-flex justify-content-between mb-3">

                    <span>
                        Menunggu
                    </span>

                    <strong class="text-warning">

                        {{ $jumlahNotifikasiMenunggu }}

                    </strong>

                </div>


                <div class="d-flex justify-content-between">

                    <span>
                        Gagal
                    </span>

                    <strong class="text-danger">

                        {{ $jumlahNotifikasiGagal }}

                    </strong>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- SUDAH BERAKHIR --}}
{{-- ========================================================= --}}

<div class="row">

    <div class="col-md-12">

        <div class="card card-danger card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-exclamation-circle mr-1"></i>

                    Satuan Pendidikan yang Sudah Berakhir

                </h3>

            </div>


            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th>
                                    NPSN
                                </th>

                                <th>
                                    Satuan Pendidikan
                                </th>

                                <th>
                                    Kecamatan
                                </th>

                                <th>
                                    Tanggal Berakhir
                                </th>

                                <th>
                                    Tindakan
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse(
                                $sudahBerakhir
                                as $satuanPendidikan
                            )

                                <tr>

                                    <td>
                                        {{ $satuanPendidikan->npsn }}
                                    </td>

                                    <td>
                                        {{ $satuanPendidikan->nama }}
                                    </td>

                                    <td>
                                        {{ $satuanPendidikan->kecamatan ?? '-' }}
                                    </td>

                                    <td>

                                        <span class="text-danger">

                                            {{ $satuanPendidikan->tanggalberakhir
                                                ? $satuanPendidikan->tanggalberakhir->format('d-m-Y')
                                                : '-' }}

                                        </span>

                                    </td>

                                    <td>

                                        <a
                                            href="#"
                                            class="btn btn-sm btn-primary"
                                        >

                                            <i class="fas fa-eye"></i>

                                            Detail

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="text-center text-success"
                                    >

                                        <i class="fas fa-check-circle mr-1"></i>

                                        Tidak ada satuan pendidikan
                                        yang sudah berakhir.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection