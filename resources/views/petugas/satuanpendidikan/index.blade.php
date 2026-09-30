@extends('layouts.petugas')

@section('title', 'Satuan Pendidikan')

@section('content')

<div class="container-fluid">

    {{-- ========================================================= --}}
    {{-- JUDUL HALAMAN --}}
    {{-- ========================================================= --}}

    <div class="row mb-3">
        <div class="col-12">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h1 class="m-0">
                        Satuan Pendidikan
                    </h1>

                    <small class="text-muted">
                        Daftar satuan pendidikan yang dikelola SIPES
                    </small>
                </div>

            </div>

        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- FILTER --}}
    {{-- ========================================================= --}}

    <div class="card card-primary card-outline">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-filter mr-1"></i>
                Pencarian dan Filter
            </h3>

        </div>

        <form
            action="{{ route('petugas.satuanpendidikan.index') }}"
            method="GET">

            <div class="card-body">

                <div class="row">

                    {{-- PENCARIAN --}}
                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="cari">
                                Cari Satuan Pendidikan
                            </label>

                            <input
                                type="text"
                                name="cari"
                                id="cari"
                                class="form-control"
                                placeholder="Nama, NPSN, atau Kepala Sekolah"
                                value="{{ request('cari') }}">

                        </div>

                    </div>


                    {{-- JENIS --}}
                    <div class="col-md-3">

                        <div class="form-group">

                            <label for="jenis">
                                Jenis Satuan Pendidikan
                            </label>

                            <select
                                name="jenis"
                                id="jenis"
                                class="form-control">

                                <option value="">
                                    Semua Jenis
                                </option>

                                @foreach($daftarJenis as $jenis)

                                <option
                                    value="{{ $jenis }}"
                                    {{ request('jenis') == $jenis ? 'selected' : '' }}>
                                    {{ $jenis }}
                                </option>

                                @endforeach

                            </select>

                        </div>

                    </div>


                    {{-- KECAMATAN --}}
                    <div class="col-md-3">

                        <div class="form-group">

                            <label for="kecamatan">
                                Kecamatan
                            </label>

                            <select
                                name="kecamatan"
                                id="kecamatan"
                                class="form-control">

                                <option value="">
                                    Semua Kecamatan
                                </option>

                                @foreach($daftarKecamatan as $kecamatan)

                                <option
                                    value="{{ $kecamatan }}"
                                    {{ request('kecamatan') == $kecamatan ? 'selected' : '' }}>
                                    {{ $kecamatan }}
                                </option>

                                @endforeach

                            </select>

                        </div>

                    </div>


                    {{-- TOMBOL --}}
                    <div class="col-md-2">

                        <div class="form-group">

                            <label>
                                Aksi
                            </label>

                            <div>

                                <button
                                    type="submit"
                                    class="btn btn-primary">
                                    <i class="fas fa-search mr-1"></i>
                                    Cari
                                </button>

                                <a
                                    href="{{ route('petugas.satuanpendidikan.index') }}"
                                    class="btn btn-secondary">
                                    <i class="fas fa-sync-alt mr-1"></i>
                                    Reset
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>


    {{-- ========================================================= --}}
    {{-- DAFTAR SATUAN PENDIDIKAN --}}
    {{-- ========================================================= --}}

    <div class="card">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-school mr-1"></i>

                Daftar Satuan Pendidikan

            </h3>

            <div class="card-tools">

                <a
                    href="{{ route('petugas.satuanpendidikan.create') }}"
                    class="btn btn-primary btn-sm mr-2">

                    <i class="fas fa-plus mr-1"></i>

                    Tambah Satuan Pendidikan

                </a>

                <span class="badge badge-info">
                    {{ $dataSatuanPendidikan->count() }} Data
                </span>

            </div>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-striped mb-0">

                    <thead>

                        <tr>

                            <th width="50">
                                No
                            </th>

                            <th>
                                Satuan Pendidikan
                            </th>

                            <th>
                                NPSN
                            </th>

                            <th>
                                Jenis
                            </th>

                            <th>
                                Kecamatan
                            </th>

                            <th>
                                Kepala Sekolah
                            </th>

                            <th>
                                Masa Berlaku
                            </th>

                            <th width="100">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($dataSatuanPendidikan as $index => $satuanPendidikan)

                        <tr>

                            {{-- NOMOR --}}
                            <td>
                                {{ $index + 1 }}
                            </td>


                            {{-- NAMA --}}
                            <td>

                                <strong>
                                    {{ $satuanPendidikan->nama }}
                                </strong>

                            </td>


                            {{-- NPSN --}}
                            <td>
                                <span class="badge badge-secondary">
                                    {{ $satuanPendidikan->npsn }}
                                </span>
                            </td>


                            {{-- JENIS --}}
                            <td>
                                {{ $satuanPendidikan->jenis ?? '-' }}
                            </td>


                            {{-- KECAMATAN --}}
                            <td>
                                {{ $satuanPendidikan->kecamatan ?? '-' }}
                            </td>


                            {{-- KEPALA SEKOLAH --}}
                            <td>
                                {{ $satuanPendidikan->kepalasekolah ?? '-' }}
                            </td>


                            {{-- MASA BERLAKU --}}
                            <td>

                                @if(!$satuanPendidikan->tanggalberakhir)

                                <span class="badge badge-secondary">
                                    Belum Ditentukan
                                </span>

                                @elseif($satuanPendidikan->tanggalberakhir->isPast())

                                <span class="badge badge-danger">
                                    Sudah Berakhir
                                </span>

                                <br>

                                <small class="text-muted">
                                    {{ $satuanPendidikan->tanggalberakhir->format('d-m-Y') }}
                                </small>

                                @elseif(
                                now()->startOfDay()->diffInDays(
                                $satuanPendidikan->tanggalberakhir,
                                false
                                ) <= 30
                                    )

                                    <span class="badge badge-warning">
                                    Segera Berakhir
                                    </span>

                                    <br>

                                    <small class="text-muted">
                                        {{ $satuanPendidikan->tanggalberakhir->format('d-m-Y') }}
                                    </small>

                                    @else

                                    <span class="badge badge-success">
                                        Masih Berlaku
                                    </span>

                                    <br>

                                    <small class="text-muted">
                                        {{ $satuanPendidikan->tanggalberakhir->format('d-m-Y') }}
                                    </small>

                                    @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <a
                                    href="{{ route(
                                            'petugas.satuanpendidikan.show',
                                            $satuanPendidikan->id
                                        ) }}"
                                    class="btn btn-sm btn-info"
                                    title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="8"
                                class="text-center py-4">

                                <i class="fas fa-school fa-2x text-muted mb-2"></i>

                                <br>

                                <strong>
                                    Data satuan pendidikan belum tersedia
                                </strong>

                                <br>

                                <small class="text-muted">
                                    Belum ada data yang sesuai dengan pencarian atau filter.
                                </small>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection