@extends('layouts.petugas')

@section('title', 'Detail Satuan Pendidikan')

@section('content')

<div class="container-fluid">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="row mb-3">

        <div class="col-md-8">

            <h1 class="m-0">
                Detail Satuan Pendidikan
            </h1>

            <small class="text-muted">
                Informasi lengkap satuan pendidikan
            </small>

        </div>

        <div class="col-md-4 text-md-right mt-2 mt-md-0">

            <a
                href="{{ route('petugas.satuanpendidikan.index') }}"
                class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i>
                Kembali
            </a>
            <a
                href="{{ route('petugas.satuanpendidikan.edit', $satuanPendidikan->id) }}"
                class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i>
                Edit Data
            </a>
        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- INFORMASI UTAMA --}}
    {{-- ========================================================= --}}

    <div class="row">

        {{-- INFORMASI SATUAN PENDIDIKAN --}}
        <div class="col-md-8">

            <div class="card card-primary card-outline">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-school mr-1"></i>

                        Informasi Satuan Pendidikan

                    </h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        {{-- NAMA --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Nama Satuan Pendidikan
                                </label>

                                <div class="form-control bg-light">
                                    {{ $satuanPendidikan->nama ?? '-' }}
                                </div>

                            </div>

                        </div>


                        {{-- NPSN --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    NPSN
                                </label>

                                <div class="form-control bg-light">
                                    {{ $satuanPendidikan->npsn ?? '-' }}
                                </div>

                            </div>

                        </div>


                        {{-- JENIS --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Jenis Satuan Pendidikan
                                </label>

                                <div class="form-control bg-light">
                                    {{ $satuanPendidikan->jenis ?? '-' }}
                                </div>

                            </div>

                        </div>


                        {{-- YAYASAN --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Yayasan
                                </label>

                                <div class="form-control bg-light">
                                    {{ $satuanPendidikan->yayasan ?? '-' }}
                                </div>

                            </div>

                        </div>


                        {{-- KEPALA SEKOLAH --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Kepala Sekolah
                                </label>

                                <div class="form-control bg-light">
                                    {{ $satuanPendidikan->kepalasekolah ?? '-' }}
                                </div>

                            </div>

                        </div>


                        {{-- WHATSAPP --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Nomor WhatsApp
                                </label>

                                <div class="form-control bg-light">

                                    @if($satuanPendidikan->nomorwhatsapp)

                                    <a
                                        href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $satuanPendidikan->nomorwhatsapp) }}"
                                        target="_blank">
                                        {{ $satuanPendidikan->nomorwhatsapp }}
                                    </a>

                                    @else

                                    -

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- STATUS --}}
        <div class="col-md-4">

            <div class="card card-primary card-outline">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-calendar-check mr-1"></i>

                        Status Masa Berlaku

                    </h3>

                </div>

                <div class="card-body text-center">

                    @if(!$satuanPendidikan->tanggalberakhir)

                    <i class="fas fa-question-circle fa-3x text-muted mb-3"></i>

                    <h4>
                        Belum Ditentukan
                    </h4>

                    @elseif($satuanPendidikan->tanggalberakhir->isPast())

                    <i class="fas fa-times-circle fa-3x text-danger mb-3"></i>

                    <h4 class="text-danger">
                        Sudah Berakhir
                    </h4>

                    @elseif(
                    now()->startOfDay()->diffInDays(
                    $satuanPendidikan->tanggalberakhir,
                    false
                    ) <= 30
                        )

                        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>

                        <h4 class="text-warning">
                            Segera Berakhir
                        </h4>

                        @else

                        <i class="fas fa-check-circle fa-3x text-success mb-3"></i>

                        <h4 class="text-success">
                            Masih Berlaku
                        </h4>

                        @endif


                        <hr>


                        <p class="mb-1">
                            <strong>
                                Tanggal Mulai
                            </strong>
                        </p>

                        <p>
                            {{ $satuanPendidikan->tanggalmulai
                            ? $satuanPendidikan->tanggalmulai->format('d-m-Y')
                            : '-'
                        }}
                        </p>


                        <p class="mb-1">
                            <strong>
                                Tanggal Berakhir
                            </strong>
                        </p>

                        <p>
                            {{ $satuanPendidikan->tanggalberakhir
                            ? $satuanPendidikan->tanggalberakhir->format('d-m-Y')
                            : '-'
                        }}
                        </p>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- ALAMAT --}}
    {{-- ========================================================= --}}

    <div class="row">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-map-marker-alt mr-1"></i>

                        Alamat Satuan Pendidikan

                    </h3>

                </div>

                <div class="card-body">

                    <p>
                        <strong>Alamat:</strong><br>
                        {{ $satuanPendidikan->alamat ?? '-' }}
                    </p>

                    <div class="row">

                        <div class="col-md-4">

                            <strong>Desa</strong>

                            <p>
                                {{ $satuanPendidikan->desa ?? '-' }}
                            </p>

                        </div>

                        <div class="col-md-4">

                            <strong>Kecamatan</strong>

                            <p>
                                {{ $satuanPendidikan->kecamatan ?? '-' }}
                            </p>

                        </div>

                        <div class="col-md-4">

                            <strong>Kabupaten</strong>

                            <p>
                                {{ $satuanPendidikan->kabupaten ?? '-' }}
                            </p>

                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <strong>Provinsi</strong>

                            <p>
                                {{ $satuanPendidikan->provinsi ?? '-' }}
                            </p>

                        </div>

                        <div class="col-md-3">

                            <strong>Latitude</strong>

                            <p>
                                {{ $satuanPendidikan->latitude ?? '-' }}
                            </p>

                        </div>

                        <div class="col-md-3">

                            <strong>Longitude</strong>

                            <p>
                                {{ $satuanPendidikan->longitude ?? '-' }}
                            </p>

                        </div>

                    </div>


                    {{-- GOOGLE MAPS --}}

                    @if(
                    $satuanPendidikan->latitude &&
                    $satuanPendidikan->longitude
                    )

                    <a
                        href="https://www.google.com/maps/search/?api=1&query={{ $satuanPendidikan->latitude }},{{ $satuanPendidikan->longitude }}"
                        target="_blank"
                        class="btn btn-success">

                        <i class="fas fa-map-marked-alt mr-1"></i>

                        Buka Lokasi di Google Maps

                    </a>

                    @elseif($satuanPendidikan->alamat)

                    <a
                        href="https://www.google.com/maps/search/?api=1&query={{ urlencode(
                                $satuanPendidikan->alamat . ', ' .
                                $satuanPendidikan->desa . ', ' .
                                $satuanPendidikan->kecamatan . ', ' .
                                $satuanPendidikan->kabupaten . ', ' .
                                $satuanPendidikan->provinsi
                            ) }}"
                        target="_blank"
                        class="btn btn-success">

                        <i class="fas fa-map-marker-alt mr-1"></i>

                        Cari Alamat di Google Maps

                    </a>

                    @endif

                </div>

            </div>

        </div>


        {{-- INFORMASI AKTIF --}}
        <div class="col-md-4">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-info-circle mr-1"></i>

                        Status Satuan Pendidikan

                    </h3>

                </div>

                <div class="card-body text-center">

                    @if($satuanPendidikan->aktif)

                    <span class="badge badge-success p-2">
                        <i class="fas fa-check mr-1"></i>
                        Aktif
                    </span>

                    @else

                    <span class="badge badge-danger p-2">
                        <i class="fas fa-times mr-1"></i>
                        Tidak Aktif
                    </span>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- RIWAYAT MASA BERLAKU --}}
    {{-- ========================================================= --}}

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-history mr-1"></i>

                        Riwayat Masa Berlaku

                    </h3>

                </div>

                <div class="card-body p-0">

                    @php
                    $riwayatMasaBerlaku =
                    $satuanPendidikan
                    ->riwayatMasaBerlaku()
                    ->with('pembuat')
                    ->orderBy(
                    'tanggalperpanjangan',
                    'desc'
                    )
                    ->get();
                    @endphp

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped mb-0">

                            <thead>

                                <tr>

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
                                        Diproses Oleh
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse(
                                $riwayatMasaBerlaku
                                as $index => $riwayat
                                )

                                <tr>

                                    <td>
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        {{ $riwayat->tanggalmulai
                                                ? $riwayat->tanggalmulai->format('d-m-Y')
                                                : '-'
                                            }}
                                    </td>

                                    <td>
                                        {{ $riwayat->tanggalberakhir
                                                ? $riwayat->tanggalberakhir->format('d-m-Y')
                                                : '-'
                                            }}
                                    </td>

                                    <td>
                                        {{ $riwayat->tanggalperpanjangan
                                                ? $riwayat->tanggalperpanjangan->format('d-m-Y')
                                                : '-'
                                            }}
                                    </td>

                                    <td>
                                        {{ $riwayat->keterangan ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $riwayat->pembuat->nama ?? '-' }}
                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="text-center py-4">

                                        <i class="fas fa-history fa-2x text-muted mb-2"></i>

                                        <br>

                                        Belum ada riwayat masa berlaku.

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

</div>

@endsection