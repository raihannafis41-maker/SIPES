@extends('layouts.admin')

@section('title', 'Notifikasi')

@section('content')

<div class="container-fluid">


{{-- ========================================================= --}}
{{-- JUDUL HALAMAN --}}
{{-- ========================================================= --}}

<div class="row">
    <div class="col-12">

        <div class="mb-3">
            <h4 class="mb-1">
                <i class="fas fa-bell mr-2"></i>
                Notifikasi
            </h4>

            <p class="text-muted mb-0">
                Pengaturan jadwal dan riwayat pengiriman notifikasi masa berlaku.
            </p>
        </div>

    </div>
</div>


{{-- ========================================================= --}}
{{-- PESAN BERHASIL --}}
{{-- ========================================================= --}}

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="fas fa-check-circle mr-2"></i>

        {{ session('success') }}

        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Tutup"
        >
            <span aria-hidden="true">&times;</span>
        </button>

    </div>

@endif


{{-- ========================================================= --}}
{{-- PESAN ERROR --}}
{{-- ========================================================= --}}

@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show">

        <i class="fas fa-exclamation-circle mr-2"></i>

        {{ session('error') }}

        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Tutup"
        >
            <span aria-hidden="true">&times;</span>
        </button>

    </div>

@endif


{{-- ========================================================= --}}
{{-- VALIDASI --}}
{{-- ========================================================= --}}

@if($errors->any())

    <div class="alert alert-danger">

        <h6>
            <i class="fas fa-exclamation-triangle mr-2"></i>
            Terdapat kesalahan:
        </h6>

        <ul class="mb-0">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


{{-- ========================================================= --}}
{{-- PENGATURAN NOTIFIKASI --}}
{{-- ========================================================= --}}

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-cog mr-2"></i>
            Pengaturan Notifikasi
        </h3>

    </div>

    <form
        action="{{ route('admin.notifikasi.pengaturan.simpan') }}"
        method="POST"
    >

        @csrf

        <div class="card-body">

            <div class="row">

                {{-- AKTIF --}}

                <div class="col-md-4">

                    <div class="form-group">

                        <label>
                            Status Notifikasi
                        </label>

                        <div class="custom-control custom-switch">

                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="aktif"
                                name="aktif"
                                value="1"
                                {{ old(
                                    'aktif',
                                    $pengaturan?->aktif ?? true
                                ) ? 'checked' : '' }}
                            >

                            <label
                                class="custom-control-label"
                                for="aktif"
                            >
                                Aktifkan Notifikasi Otomatis
                            </label>

                        </div>

                    </div>

                </div>


                {{-- HARI SEBELUM --}}

                <div class="col-md-4">

                    <div class="form-group">

                        <label for="harisebelum">
                            Kirim Pengingat
                        </label>

                        <div class="input-group">

                            <input
                                type="number"
                                class="form-control @error('harisebelum') is-invalid @enderror"
                                id="harisebelum"
                                name="harisebelum"
                                min="1"
                                max="365"
                                value="{{ old(
                                    'harisebelum',
                                    $pengaturan?->harisebelum ?? 30
                                ) }}"
                                required
                            >

                            <div class="input-group-append">

                                <span class="input-group-text">
                                    hari sebelum
                                </span>

                            </div>

                        </div>

                        @error('harisebelum')

                            <span class="text-danger">
                                {{ $message }}
                            </span>

                        @enderror

                        <small class="form-text text-muted">
                            Contoh: 30 berarti notifikasi dikirim 30 hari sebelum masa berlaku berakhir.
                        </small>

                    </div>

                </div>


                {{-- JAM KIRIM --}}

                <div class="col-md-4">

                    <div class="form-group">

                        <label for="jamkirim">
                            Jam Pengiriman
                        </label>

                        <input
                            type="time"
                            class="form-control @error('jamkirim') is-invalid @enderror"
                            id="jamkirim"
                            name="jamkirim"
                            value="{{ old(
                                'jamkirim',
                                $pengaturan?->jamkirim ?? '08:00'
                            ) }}"
                            required
                        >

                        @error('jamkirim')

                            <span class="text-danger">
                                {{ $message }}
                            </span>

                        @enderror

                        <small class="form-text text-muted">
                            Waktu pengiriman menggunakan waktu server aplikasi.
                        </small>

                    </div>

                </div>

            </div>


            <div class="row">

                {{-- JENIS NOTIFIKASI --}}

                <div class="col-md-6">

                    <div class="form-group">

                        <label for="jenisnotifikasi">
                            Jenis Notifikasi
                        </label>

                        <select
                            name="jenisnotifikasi"
                            id="jenisnotifikasi"
                            class="form-control @error('jenisnotifikasi') is-invalid @enderror"
                            required
                        >

                            <option
                                value="pengingat"
                                {{ old(
                                    'jenisnotifikasi',
                                    $pengaturan?->jenisnotifikasi ?? 'pengingat'
                                ) == 'pengingat' ? 'selected' : '' }}
                            >
                                Pengingat Masa Berlaku
                            </option>

                            <option
                                value="akanberakhir"
                                {{ old(
                                    'jenisnotifikasi',
                                    $pengaturan?->jenisnotifikasi ?? 'pengingat'
                                ) == 'akanberakhir' ? 'selected' : '' }}
                            >
                                Masa Berlaku Akan Berakhir
                            </option>

                            <option
                                value="berakhir"
                                {{ old(
                                    'jenisnotifikasi',
                                    $pengaturan?->jenisnotifikasi ?? 'pengingat'
                                ) == 'berakhir' ? 'selected' : '' }}
                            >
                                Masa Berlaku Sudah Berakhir
                            </option>

                        </select>

                        @error('jenisnotifikasi')

                            <span class="text-danger">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>

            </div>

        </div>


        <div class="card-footer">

            <button
                type="submit"
                class="btn btn-primary"
            >

                <i class="fas fa-save mr-1"></i>

                Simpan Pengaturan

            </button>

        </div>

    </form>

</div>


{{-- ========================================================= --}}
{{-- RIWAYAT NOTIFIKASI --}}
{{-- ========================================================= --}}

<div class="card card-outline card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-history mr-2"></i>

            Riwayat Pengiriman Notifikasi

        </h3>

    </div>


    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-bordered table-hover mb-0">

                <thead class="thead-light">

                    <tr>

                        <th width="50">
                            No
                        </th>

                        <th>
                            Satuan Pendidikan
                        </th>

                        <th>
                            Jenis Notifikasi
                        </th>

                        <th>
                            Nomor Tujuan
                        </th>

                        <th>
                            Tanggal Kirim
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Keterangan
                        </th>

                        <th width="120">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($riwayatNotifikasi as $riwayat)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                @if($riwayat->satuanpendidikan)

                                    <strong>
                                        {{ $riwayat->satuanpendidikan->nama }}
                                    </strong>

                                    <br>

                                    <small class="text-muted">

                                        NPSN:
                                        {{ $riwayat->satuanpendidikan->npsn }}

                                    </small>

                                @else

                                    <span class="text-muted">
                                        Data tidak ditemukan
                                    </span>

                                @endif

                            </td>


                            <td>

                                @if($riwayat->jenisnotifikasi === 'pengingat')

                                    <span class="badge badge-info">
                                        Pengingat
                                    </span>

                                @elseif($riwayat->jenisnotifikasi === 'akanberakhir')

                                    <span class="badge badge-warning">
                                        Akan Berakhir
                                    </span>

                                @elseif($riwayat->jenisnotifikasi === 'berakhir')

                                    <span class="badge badge-danger">
                                        Sudah Berakhir
                                    </span>

                                @else

                                    <span class="badge badge-secondary">
                                        {{ ucfirst($riwayat->jenisnotifikasi) }}
                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $riwayat->nomortujuan }}
                            </td>


                            <td>

                                @if($riwayat->tanggalkirim)

                                    {{ $riwayat->tanggalkirim->format('d-m-Y H:i') }}

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            <td>

                                @if($riwayat->status === 'terkirim')

                                    <span class="badge badge-success">

                                        <i class="fas fa-check mr-1"></i>

                                        Terkirim

                                    </span>

                                @elseif($riwayat->status === 'gagal')

                                    <span class="badge badge-danger">

                                        <i class="fas fa-times mr-1"></i>

                                        Gagal

                                    </span>

                                @elseif($riwayat->status === 'menunggu')

                                    <span class="badge badge-warning">

                                        <i class="fas fa-clock mr-1"></i>

                                        Menunggu

                                    </span>

                                @else

                                    <span class="badge badge-secondary">

                                        {{ ucfirst($riwayat->status) }}

                                    </span>

                                @endif

                            </td>


                            <td>

                                {{ $riwayat->keterangan ?? '-' }}

                            </td>


                            <td>

                                @if($riwayat->status === 'gagal')

                                    <form
                                        action="{{ route(
                                            'admin.notifikasi.kirimulang',
                                            $riwayat->id
                                        ) }}"
                                        method="POST"
                                        class="d-inline"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-warning"
                                            title="Kirim Ulang"
                                        >

                                            <i class="fas fa-redo"></i>

                                        </button>

                                    </form>

                                @else

                                    <button
                                        type="button"
                                        class="btn btn-sm btn-secondary"
                                        disabled
                                    >

                                        <i class="fas fa-check"></i>

                                    </button>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="text-center py-4"
                            >

                                <i class="fas fa-bell-slash fa-2x text-muted mb-2"></i>

                                <br>

                                <span class="text-muted">
                                    Belum ada riwayat pengiriman notifikasi.
                                </span>

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
