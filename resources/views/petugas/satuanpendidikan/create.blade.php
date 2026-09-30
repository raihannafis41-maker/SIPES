@extends('layouts.petugas')

@section('title', 'Tambah Satuan Pendidikan')

@section('content')

<div class="container-fluid">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="row mb-3">

        <div class="col-md-8">

            <h1 class="m-0">
                Tambah Satuan Pendidikan
            </h1>

            <small class="text-muted">
                Tambahkan data satuan pendidikan baru
            </small>

        </div>

        <div class="col-md-4 text-md-right mt-2 mt-md-0">

            <a
                href="{{ route('petugas.satuanpendidikan.index') }}"
                class="btn btn-secondary">

                <i class="fas fa-arrow-left mr-1"></i>

                Kembali

            </a>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- PESAN VALIDASI --}}
    {{-- ========================================================= --}}

    @if($errors->any())

    <div class="alert alert-danger">

        <h5>
            <i class="icon fas fa-ban"></i>
            Data belum dapat disimpan
        </h5>

        <ul class="mb-0">

            @foreach($errors->all() as $error)

            <li>
                {{ $error }}
            </li>

            @endforeach

        </ul>

    </div>

    @endif


    {{-- ========================================================= --}}
    {{-- FORM --}}
    {{-- ========================================================= --}}

    <form
        action="{{ route('petugas.satuanpendidikan.store') }}"
        method="POST">

        @csrf


        {{-- ===================================================== --}}
        {{-- INFORMASI UTAMA --}}
        {{-- ===================================================== --}}

        <div class="card card-primary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-school mr-1"></i>

                    Informasi Satuan Pendidikan

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    {{-- NPSN --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="npsn">
                                NPSN <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="npsn"
                                id="npsn"
                                class="form-control @error('npsn') is-invalid @enderror"
                                value="{{ old('npsn') }}"
                                placeholder="Masukkan NPSN"
                                maxlength="20"
                                required>

                            @error('npsn')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror

                        </div>

                    </div>


                    {{-- NAMA --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="nama">
                                Nama Satuan Pendidikan
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="nama"
                                id="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}"
                                placeholder="Masukkan nama satuan pendidikan"
                                required>

                            @error('nama')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror

                        </div>

                    </div>


                    {{-- JENIS --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="jenis">
                                Jenis Satuan Pendidikan
                                <span class="text-danger">*</span>
                            </label>

                            <select
                                name="jenis"
                                id="jenis"
                                class="form-control @error('jenis') is-invalid @enderror"
                                required>

                                <option value="">
                                    -- Pilih Jenis --
                                </option>

                                <option
                                    value="TK"
                                    {{ old('jenis') == 'TK' ? 'selected' : '' }}>
                                    TK
                                </option>

                                <option
                                    value="PAUD"
                                    {{ old('jenis') == 'PAUD' ? 'selected' : '' }}>
                                    PAUD
                                </option>

                                <option
                                    value="PKBM"
                                    {{ old('jenis') == 'PKBM' ? 'selected' : '' }}>
                                    PKBM
                                </option>

                                <option
                                    value="TPA"
                                    {{ old('jenis') == 'TPA' ? 'selected' : '' }}>
                                    TPA
                                </option>

                                <option
                                    value="Lainnya"
                                    {{ old('jenis') == 'Lainnya' ? 'selected' : '' }}>
                                    Lainnya
                                </option>

                            </select>

                            @error('jenis')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror

                        </div>

                    </div>


                    {{-- YAYASAN --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="yayasan">
                                Yayasan
                            </label>

                            <input
                                type="text"
                                name="yayasan"
                                id="yayasan"
                                class="form-control"
                                value="{{ old('yayasan') }}"
                                placeholder="Masukkan nama yayasan">

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- KEPALA SEKOLAH --}}
        {{-- ===================================================== --}}

        <div class="card card-info card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-user-tie mr-1"></i>

                    Kepala Sekolah

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    {{-- NAMA KEPALA SEKOLAH --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="kepalasekolah">
                                Kepala Sekolah
                            </label>

                            <input
                                type="text"
                                name="kepalasekolah"
                                id="kepalasekolah"
                                class="form-control"
                                value="{{ old('kepalasekolah') }}"
                                placeholder="Masukkan nama kepala sekolah">

                        </div>

                    </div>


                    {{-- WHATSAPP --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="nomorwhatsapp">
                                Nomor WhatsApp
                            </label>

                            <input
                                type="text"
                                name="nomorwhatsapp"
                                id="nomorwhatsapp"
                                class="form-control"
                                value="{{ old('nomorwhatsapp') }}"
                                placeholder="Contoh: 083xxxxxxxxx">

                            <small class="form-text text-muted">
                                Nomor ini digunakan untuk notifikasi masa berlaku.
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- ALAMAT --}}
        {{-- ===================================================== --}}

        <div class="card card-success card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-map-marker-alt mr-1"></i>

                    Alamat Satuan Pendidikan

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    {{-- ALAMAT --}}
                    <div class="col-md-12">

                        <div class="form-group">

                            <label for="alamat">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                id="alamat"
                                rows="3"
                                class="form-control"
                                placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>

                        </div>

                    </div>


                    {{-- DESA --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="desa">
                                Desa
                            </label>

                            <input
                                type="text"
                                name="desa"
                                id="desa"
                                class="form-control"
                                value="{{ old('desa') }}"
                                placeholder="Masukkan desa">

                        </div>

                    </div>


                    {{-- KECAMATAN --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="kecamatan">
                                Kecamatan
                            </label>

                            <input
                                type="text"
                                name="kecamatan"
                                id="kecamatan"
                                class="form-control"
                                value="{{ old('kecamatan') }}"
                                placeholder="Masukkan kecamatan">

                        </div>

                    </div>


                    {{-- KABUPATEN --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="kabupaten">
                                Kabupaten
                            </label>

                            <input
                                type="text"
                                name="kabupaten"
                                id="kabupaten"
                                class="form-control"
                                value="{{ old('kabupaten') }}"
                                placeholder="Masukkan kabupaten">

                        </div>

                    </div>


                    {{-- PROVINSI --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="provinsi">
                                Provinsi
                            </label>

                            <input
                                type="text"
                                name="provinsi"
                                id="provinsi"
                                class="form-control"
                                value="{{ old('provinsi') }}"
                                placeholder="Masukkan provinsi">

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- LOKASI --}}
        {{-- ===================================================== --}}

        <div class="card card-warning card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-map mr-1"></i>

                    Koordinat Lokasi

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    {{-- LATITUDE --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="latitude">
                                Latitude
                            </label>

                            <input
                                type="text"
                                name="latitude"
                                id="latitude"
                                class="form-control"
                                value="{{ old('latitude') }}"
                                placeholder="Contoh: 4.2345678">

                        </div>

                    </div>


                    {{-- LONGITUDE --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="longitude">
                                Longitude
                            </label>

                            <input
                                type="text"
                                name="longitude"
                                id="longitude"
                                class="form-control"
                                value="{{ old('longitude') }}"
                                placeholder="Contoh: 97.1234567">

                        </div>

                    </div>

                </div>

                <div class="alert alert-info mb-0">

                    <i class="fas fa-info-circle mr-1"></i>

                    Koordinat dapat diisi jika lokasi satuan pendidikan
                    sudah diketahui. Data ini digunakan untuk membuka
                    lokasi melalui Google Maps.

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- MASA BERLAKU --}}
        {{-- ===================================================== --}}

        <div class="card card-danger card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-calendar-alt mr-1"></i>

                    Masa Berlaku

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    {{-- TANGGAL MULAI --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="tanggalmulai">
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                name="tanggalmulai"
                                id="tanggalmulai"
                                class="form-control"
                                value="{{ old('tanggalmulai') }}">

                        </div>

                    </div>


                    {{-- TANGGAL BERAKHIR --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="tanggalberakhir">
                                Tanggal Berakhir
                            </label>

                            <input
                                type="date"
                                name="tanggalberakhir"
                                id="tanggalberakhir"
                                class="form-control"
                                value="{{ old('tanggalberakhir') }}">

                        </div>

                    </div>

                </div>

                <div class="alert alert-warning mb-0">

                    <i class="fas fa-exclamation-triangle mr-1"></i>

                    Pastikan tanggal masa berlaku diisi sesuai dokumen
                    yang dimiliki satuan pendidikan.

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- STATUS --}}
        {{-- ===================================================== --}}

        <div class="card card-secondary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-toggle-on mr-1"></i>

                    Status

                </h3>

            </div>

            <div class="card-body">

                <div class="custom-control custom-switch">

                    <input
                        type="checkbox"
                        name="aktif"
                        value="1"
                        class="custom-control-input"
                        id="aktif"
                        {{ old('aktif', true) ? 'checked' : '' }}>

                    <label
                        class="custom-control-label"
                        for="aktif">
                        Satuan Pendidikan Aktif
                    </label>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- TOMBOL --}}
        {{-- ===================================================== --}}

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <a
                        href="{{ route('petugas.satuanpendidikan.index') }}"
                        class="btn btn-secondary">

                        <i class="fas fa-times mr-1"></i>

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-save mr-1"></i>

                        Simpan Satuan Pendidikan

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection