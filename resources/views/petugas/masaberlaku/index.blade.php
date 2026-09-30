@extends('layouts.petugas')

@section('title', 'Masa Berlaku & Perpanjangan')

@section('content')

<div class="container-fluid">

    {{-- ========================================================= --}}
    {{-- JUDUL --}}
    {{-- ========================================================= --}}

    <div class="row mb-3">

        <div class="col-12">

            <h1 class="h3 mb-1">
                <i class="fas fa-calendar-alt mr-2"></i>
                Masa Berlaku & Perpanjangan
            </h1>

            <p class="text-muted mb-0">
                Kelola masa berlaku dan perpanjangan satuan pendidikan.
            </p>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- PESAN BERHASIL --}}
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
    {{-- FORM PENCARIAN & FILTER --}}
    {{-- ========================================================= --}}

    <div class="card card-primary">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-filter mr-1"></i>
                Pencarian & Filter
            </h3>

        </div>


        <form
            action="{{ route('petugas.masaberlaku.index') }}"
            method="GET">

            <div class="card-body">

                <div class="row">

                    {{-- Pencarian --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="cari">
                                Cari Satuan Pendidikan
                            </label>

                            <div class="input-group">

                                <input
                                    type="text"
                                    name="cari"
                                    id="cari"
                                    class="form-control"
                                    value="{{ request('cari') }}"
                                    placeholder="Nama, NPSN, atau kepala sekolah">

                                <div class="input-group-append">

                                    <button
                                        type="submit"
                                        class="btn btn-primary">
                                        <i class="fas fa-search mr-1"></i>
                                        Cari
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Status --}}
                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="status">
                                Status Masa Berlaku
                            </label>

                            <select
                                name="status"
                                id="status"
                                class="form-control">

                                <option value="">
                                    Semua Status
                                </option>

                                <option
                                    value="masihberlaku"
                                    {{ request('status') == 'masihberlaku' ? 'selected' : '' }}>
                                    Masih Berlaku
                                </option>

                                <option
                                    value="segeraberakhir"
                                    {{ request('status') == 'segeraberakhir' ? 'selected' : '' }}>
                                    Segera Berakhir
                                </option>

                                <option
                                    value="sudahberakhir"
                                    {{ request('status') == 'sudahberakhir' ? 'selected' : '' }}>
                                    Sudah Berakhir
                                </option>

                                <option
                                    value="belumditentukan"
                                    {{ request('status') == 'belumditentukan' ? 'selected' : '' }}>
                                    Belum Ditentukan
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- Tombol --}}
                    <div class="col-md-2">

                        <div class="form-group">

                            <label class="d-block">
                                &nbsp;
                            </label>

                            <a
                                href="{{ route('petugas.masaberlaku.index') }}"
                                class="btn btn-secondary btn-block">
                                <i class="fas fa-sync-alt mr-1"></i>
                                Reset
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>


    {{-- ========================================================= --}}
    {{-- TABEL MASA BERLAKU --}}
    {{-- ========================================================= --}}

    <div class="card card-primary">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-list mr-1"></i>

                Daftar Masa Berlaku

                <span class="badge badge-light ml-2">
                    {{ $dataSatuanPendidikan->count() }}
                    Satuan Pendidikan
                </span>

            </h3>

        </div>


        <div class="card-body p-0">

            @if ($dataSatuanPendidikan->count() > 0)

            <div class="table-responsive">

                <table class="table table-bordered table-hover mb-0">

                    <thead>

                        <tr class="text-center">

                            <th width="50">
                                No
                            </th>

                            <th>
                                Satuan Pendidikan
                            </th>

                            <th width="120">
                                NPSN
                            </th>

                            <th width="140">
                                Tanggal Mulai
                            </th>

                            <th width="140">
                                Tanggal Berakhir
                            </th>

                            <th width="150">
                                Status
                            </th>

                            <th width="100">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($dataSatuanPendidikan as $item)

                        @php
                        $status = $item->status_masa_berlaku;
                        @endphp

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>


                            {{-- Nama --}}
                            <td>

                                <strong>
                                    {{ $item->nama }}
                                </strong>

                                <br>

                                <small class="text-muted">

                                    <i class="fas fa-school mr-1"></i>

                                    {{ $item->jenis }}

                                    @if ($item->kepalasekolah)
                                    <br>

                                    <i class="fas fa-user mr-1"></i>

                                    {{ $item->kepalasekolah }}
                                    @endif

                                </small>

                            </td>


                            {{-- NPSN --}}
                            <td class="text-center">

                                <span class="badge badge-info">
                                    {{ $item->npsn }}
                                </span>

                            </td>


                            {{-- Tanggal Mulai --}}
                            <td class="text-center">

                                @if ($item->tanggalmulai)

                                {{ $item->tanggalmulai->format('d-m-Y') }}

                                @else

                                <span class="text-muted">
                                    -
                                </span>

                                @endif

                            </td>


                            {{-- Tanggal Berakhir --}}
                            <td class="text-center">

                                @if ($item->tanggalberakhir)

                                <strong>
                                    {{ $item->tanggalberakhir->format('d-m-Y') }}
                                </strong>

                                @else

                                <span class="text-muted">
                                    Belum ditentukan
                                </span>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td class="text-center">

                                @if ($status == 'Sudah Berakhir')

                                <span class="badge badge-danger">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    Sudah Berakhir
                                </span>

                                @elseif ($status == 'Segera Berakhir')

                                <span class="badge badge-warning">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Segera Berakhir
                                </span>

                                @elseif ($status == 'Masih Berlaku')

                                <span class="badge badge-success">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Masih Berlaku
                                </span>

                                @else

                                <span class="badge badge-secondary">
                                    <i class="fas fa-question-circle mr-1"></i>
                                    Belum Ditentukan
                                </span>

                                @endif

                            </td>


                            {{-- Aksi --}}
                            <td class="text-center">

                                <a
                                    href="{{ route('petugas.masaberlaku.show', $item->id) }}"
                                    class="btn btn-info btn-sm"
                                    title="Detail">

                                    <i class="fas fa-eye mr-1"></i>

                                    Detail

                                </a>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            @else

            <div class="text-center p-5">

                <i
                    class="fas fa-calendar-times fa-3x text-muted mb-3"></i>

                <h5>
                    Data tidak ditemukan
                </h5>

                <p class="text-muted mb-0">
                    Belum ada data masa berlaku yang sesuai dengan pencarian.
                </p>

            </div>

            @endif

        </div>

    </div>

</div>

@endsection