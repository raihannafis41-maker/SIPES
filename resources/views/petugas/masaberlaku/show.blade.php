@extends('layouts.petugas')

@section('title', 'Detail Masa Berlaku')

@section('content')

<div class="container-fluid">

    {{-- ========================================================= --}}
    {{-- JUDUL HALAMAN --}}
    {{-- ========================================================= --}}

    <div class="row mb-3">

        <div class="col-12">

            <h1 class="h3 mb-1">
                <i class="fas fa-calendar-alt mr-2"></i>
                Detail Masa Berlaku
            </h1>

            <p class="text-muted mb-0">
                Informasi masa berlaku dan riwayat perpanjangan satuan pendidikan.
            </p>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- PESAN --}}
    {{-- ========================================================= --}}

    @if (session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
        </button>

        <i class="fas fa-check-circle mr-1"></i>

        {{ session('success') }}

    </div>

    @endif


    {{-- ========================================================= --}}
    {{-- INFORMASI SATUAN PENDIDIKAN --}}
    {{-- ========================================================= --}}

    <div class="card card-primary">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-school mr-1"></i>

                Informasi Satuan Pendidikan

            </h3>

        </div>


        <div class="card-body">

            <div class="row">

                {{-- Informasi kiri --}}
                <div class="col-md-6">

                    <table class="table table-borderless">

                        <tr>

                            <th width="180">
                                Nama
                            </th>

                            <td>
                                :
                                <strong>
                                    {{ $satuanPendidikan->nama }}
                                </strong>
                            </td>

                        </tr>

                        <tr>

                            <th>
                                NPSN
                            </th>

                            <td>
                                :
                                <span class="badge badge-info">
                                    {{ $satuanPendidikan->npsn }}
                                </span>
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Jenis
                            </th>

                            <td>
                                :
                                {{ $satuanPendidikan->jenis }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Kepala Sekolah
                            </th>

                            <td>
                                :
                                {{ $satuanPendidikan->kepalasekolah ?: '-' }}
                            </td>

                        </tr>

                    </table>

                </div>


                {{-- Informasi kanan --}}
                <div class="col-md-6">

                    <table class="table table-borderless">

                        <tr>

                            <th width="180">
                                Kecamatan
                            </th>

                            <td>
                                :
                                {{ $satuanPendidikan->kecamatan ?: '-' }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Kabupaten
                            </th>

                            <td>
                                :
                                {{ $satuanPendidikan->kabupaten ?: '-' }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Nomor WhatsApp
                            </th>

                            <td>
                                :

                                @if ($satuanPendidikan->nomorwhatsapp)

                                <a
                                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $satuanPendidikan->nomorwhatsapp) }}"
                                    target="_blank">
                                    {{ $satuanPendidikan->nomorwhatsapp }}
                                </a>

                                @else

                                <span class="text-muted">
                                    Belum tersedia
                                </span>

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Status Satuan Pendidikan
                            </th>

                            <td>
                                :

                                @if ($satuanPendidikan->aktif)

                                <span class="badge badge-success">
                                    Aktif
                                </span>

                                @else

                                <span class="badge badge-secondary">
                                    Tidak Aktif
                                </span>

                                @endif

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MASA BERLAKU SAAT INI --}}
    {{-- ========================================================= --}}

    @php
    $status = $satuanPendidikan->status_masa_berlaku;
    @endphp


    <div class="card card-primary">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-calendar-check mr-1"></i>

                Masa Berlaku Saat Ini

            </h3>

        </div>


        <div class="card-body">

            <div class="row text-center">

                {{-- Tanggal Mulai --}}
                <div class="col-md-4">

                    <div class="border rounded p-3">

                        <div class="text-muted mb-2">
                            Tanggal Mulai
                        </div>

                        <h4 class="mb-0">

                            @if ($satuanPendidikan->tanggalmulai)

                            {{ $satuanPendidikan->tanggalmulai->format('d-m-Y') }}

                            @else

                            <span class="text-muted">
                                Belum ditentukan
                            </span>

                            @endif

                        </h4>

                    </div>

                </div>


                {{-- Tanggal Berakhir --}}
                <div class="col-md-4">

                    <div class="border rounded p-3">

                        <div class="text-muted mb-2">
                            Tanggal Berakhir
                        </div>

                        <h4 class="mb-0">

                            @if ($satuanPendidikan->tanggalberakhir)

                            {{ $satuanPendidikan->tanggalberakhir->format('d-m-Y') }}

                            @else

                            <span class="text-muted">
                                Belum ditentukan
                            </span>

                            @endif

                        </h4>

                    </div>

                </div>


                {{-- Status --}}
                <div class="col-md-4">

                    <div class="border rounded p-3">

                        <div class="text-muted mb-2">
                            Status Masa Berlaku
                        </div>


                        @if ($status == 'Sudah Berakhir')

                        <span class="badge badge-danger p-2">

                            <i class="fas fa-times-circle mr-1"></i>

                            Sudah Berakhir

                        </span>


                        @elseif ($status == 'Segera Berakhir')

                        <span class="badge badge-warning p-2">

                            <i class="fas fa-exclamation-triangle mr-1"></i>

                            Segera Berakhir

                        </span>


                        @elseif ($status == 'Masih Berlaku')

                        <span class="badge badge-success p-2">

                            <i class="fas fa-check-circle mr-1"></i>

                            Masih Berlaku

                        </span>


                        @else

                        <span class="badge badge-secondary p-2">

                            <i class="fas fa-question-circle mr-1"></i>

                            Belum Ditentukan

                        </span>

                        @endif

                    </div>

                </div>

            </div>


            {{-- Tombol Perpanjang --}}
            <div class="text-center mt-4">

                <a
                    href="{{ route('petugas.masaberlaku.perpanjangan', $satuanPendidikan->id) }}"
                    class="btn btn-warning btn-lg">

                    <i class="fas fa-sync-alt mr-2"></i>

                    Perpanjang Masa Berlaku

                </a>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- RIWAYAT PERPANJANGAN --}}
    {{-- ========================================================= --}}

    <div class="card card-primary">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-history mr-1"></i>

                Riwayat Perpanjangan

            </h3>

        </div>


        <div class="card-body p-0">

            @if ($riwayatMasaBerlaku->count() > 0)

            <div class="table-responsive">

                <table class="table table-bordered table-hover mb-0">

                    <thead>

                        <tr class="text-center">

                            <th width="50">
                                No
                            </th>

                            <th>
                                Tanggal Mulai
                            </th>

                            <th>
                                Tanggal Berakhir
                            </th>

                            <th>
                                Tanggal Perpanjangan
                            </th>

                            <th>
                                Keterangan
                            </th>

                            <th>
                                Dibuat Oleh
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($riwayatMasaBerlaku as $riwayat)

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>


                            <td class="text-center">

                                @if ($riwayat->tanggalmulai)

                                {{ $riwayat->tanggalmulai->format('d-m-Y') }}

                                @else

                                -

                                @endif

                            </td>


                            <td class="text-center">

                                @if ($riwayat->tanggalberakhir)

                                <strong>
                                    {{ $riwayat->tanggalberakhir->format('d-m-Y') }}
                                </strong>

                                @else

                                -

                                @endif

                            </td>


                            <td class="text-center">

                                @if ($riwayat->tanggalperpanjangan)

                                {{ $riwayat->tanggalperpanjangan->format('d-m-Y') }}

                                @else

                                -

                                @endif

                            </td>


                            <td>

                                {{ $riwayat->keterangan ?: '-' }}

                            </td>


                            <td>

                                @if ($riwayat->pembuat)

                                <i class="fas fa-user mr-1"></i>

                                {{ $riwayat->pembuat->nama }}

                                @else

                                <span class="text-muted">
                                    -
                                </span>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            @else

            <div class="text-center p-5">

                <i
                    class="fas fa-history fa-3x text-muted mb-3"></i>

                <h5>
                    Belum Ada Riwayat Perpanjangan
                </h5>

                <p class="text-muted mb-0">

                    Belum ada perpanjangan masa berlaku
                    untuk satuan pendidikan ini.

                </p>

            </div>

            @endif

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- TOMBOL KEMBALI --}}
    {{-- ========================================================= --}}

    <div class="mb-4">

        <a
            href="{{ route('petugas.masaberlaku.index') }}"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left mr-1"></i>

            Kembali ke Daftar Masa Berlaku

        </a>

    </div>

</div>

@endsection