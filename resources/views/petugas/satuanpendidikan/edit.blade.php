@extends('layouts.petugas')

@section('title', 'Edit Satuan Pendidikan')

@section('content')

<div class="container-fluid">

    {{-- ========================================================= --}}
    {{-- JUDUL HALAMAN --}}
    {{-- ========================================================= --}}

    <div class="row mb-3">
        <div class="col-12">

            <h1 class="h3 mb-1">
                <i class="fas fa-edit mr-2"></i>
                Edit Satuan Pendidikan
            </h1>

            <p class="text-muted mb-0">
                Perbarui data satuan pendidikan.
            </p>

        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- ERROR VALIDASI --}}
    {{-- ========================================================= --}}

    @if ($errors->any())

    <div class="alert alert-danger">

        <h5>
            <i class="fas fa-exclamation-triangle mr-1"></i>
            Terdapat kesalahan
        </h5>

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif


    {{-- ========================================================= --}}
    {{-- FORM EDIT --}}
    {{-- ========================================================= --}}

    <div class="card card-primary">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-school mr-1"></i>
                Data Satuan Pendidikan
            </h3>

        </div>


        <form
            action="{{ route('petugas.satuanpendidikan.update', $satuanPendidikan->id) }}"
            method="POST">

            @csrf
            @method('PUT')


            <div class="card-body">

                {{-- ================================================= --}}
                {{-- DATA UTAMA --}}
                {{-- ================================================= --}}

                <h5 class="text-primary mb-3">
                    <i class="fas fa-info-circle mr-1"></i>
                    Informasi Utama
                </h5>


                <div class="row">

                    {{-- NPSN --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="npsn">
                                NPSN
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="npsn"
                                id="npsn"
                                class="form-control @error('npsn') is-invalid @enderror"
                                value="{{ old('npsn', $satuanPendidikan->npsn) }}"
                                maxlength="20"
                                required>

                            @error('npsn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>


                    {{-- Nama --}}
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
                                value="{{ old('nama', $satuanPendidikan->nama) }}"
                                required>

                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>


                    {{-- Jenis --}}
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
                                    {{ old('jenis', $satuanPendidikan->jenis) == 'TK' ? 'selected' : '' }}>
                                    TK
                                </option>

                                <option
                                    value="PAUD"
                                    {{ old('jenis', $satuanPendidikan->jenis) == 'PAUD' ? 'selected' : '' }}>
                                    PAUD
                                </option>

                                <option
                                    value="PKBM"
                                    {{ old('jenis', $satuanPendidikan->jenis) == 'PKBM' ? 'selected' : '' }}>
                                    PKBM
                                </option>

                                <option
                                    value="TPA"
                                    {{ old('jenis', $satuanPendidikan->jenis) == 'TPA' ? 'selected' : '' }}>
                                    TPA
                                </option>

                                <option
                                    value="Lainnya"
                                    {{ old('jenis', $satuanPendidikan->jenis) == 'Lainnya' ? 'selected' : '' }}>
                                    KB
                                </option>

                                <option
                                    value="Lainnya"
                                    {{ old('jenis', $satuanPendidikan->jenis) == 'Lainnya' ? 'selected' : '' }}>
                                    Lainnya
                                </option>

                            </select>

                            @error('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>


                    {{-- Yayasan --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="yayasan">
                                Yayasan
                            </label>

                            <input
                                type="text"
                                name="yayasan"
                                id="yayasan"
                                class="form-control @error('yayasan') is-invalid @enderror"
                                value="{{ old('yayasan', $satuanPendidikan->yayasan) }}">

                            @error('yayasan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- KEPALA SEKOLAH --}}
                {{-- ================================================= --}}

                <h5 class="text-primary mt-4 mb-3">
                    <i class="fas fa-user-tie mr-1"></i>
                    Kepala Sekolah
                </h5>


                <div class="row">

                    {{-- Kepala Sekolah --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="kepalasekolah">
                                Nama Kepala Sekolah
                            </label>

                            <input
                                type="text"
                                name="kepalasekolah"
                                id="kepalasekolah"
                                class="form-control"
                                value="{{ old('kepalasekolah', $satuanPendidikan->kepalasekolah) }}">

                        </div>

                    </div>


                    {{-- WhatsApp --}}
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
                                value="{{ old('nomorwhatsapp', $satuanPendidikan->nomorwhatsapp) }}"
                                placeholder="Contoh: 628123456789">

                            <small class="text-muted">
                                Gunakan nomor WhatsApp yang aktif.
                            </small>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- ALAMAT --}}
                {{-- ================================================= --}}

                <h5 class="text-primary mt-4 mb-3">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Alamat Satuan Pendidikan
                </h5>


                <div class="row">

                    {{-- Alamat --}}
                    <div class="col-md-12">

                        <div class="form-group">

                            <label for="alamat">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                id="alamat"
                                rows="3"
                                class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $satuanPendidikan->alamat) }}</textarea>

                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>


                    {{-- Desa --}}
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
                                value="{{ old('desa', $satuanPendidikan->desa) }}">

                        </div>

                    </div>


                    {{-- Kecamatan --}}
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
                                value="{{ old('kecamatan', $satuanPendidikan->kecamatan) }}">

                        </div>

                    </div>


                    {{-- Kabupaten --}}
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
                                value="{{ old('kabupaten', $satuanPendidikan->kabupaten) }}">

                        </div>

                    </div>


                    {{-- Provinsi --}}
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
                                value="{{ old('provinsi', $satuanPendidikan->provinsi) }}">

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- KOORDINAT --}}
                {{-- ================================================= --}}

                <h5 class="text-primary mt-4 mb-3">
                    <i class="fas fa-location-arrow mr-1"></i>
                    Koordinat Lokasi
                </h5>


                <div class="row">

                    {{-- Latitude --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="latitude">
                                Latitude
                            </label>

                            <input
                                type="text"
                                name="latitude"
                                id="latitude"
                                class="form-control @error('latitude') is-invalid @enderror"
                                value="{{ old('latitude', $satuanPendidikan->latitude) }}"
                                placeholder="Contoh: 4.2345678">

                            @error('latitude')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>


                    {{-- Longitude --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="longitude">
                                Longitude
                            </label>

                            <input
                                type="text"
                                name="longitude"
                                id="longitude"
                                class="form-control @error('longitude') is-invalid @enderror"
                                value="{{ old('longitude', $satuanPendidikan->longitude) }}"
                                placeholder="Contoh: 97.1234567">

                            @error('longitude')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- MASA BERLAKU --}}
                {{-- ================================================= --}}

                <h5 class="text-primary mt-4 mb-3">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    Masa Berlaku
                </h5>


                <div class="row">

                    {{-- Tanggal Mulai --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="tanggalmulai">
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                name="tanggalmulai"
                                id="tanggalmulai"
                                class="form-control @error('tanggalmulai') is-invalid @enderror"
                                value="{{ old('tanggalmulai', optional($satuanPendidikan->tanggalmulai)->format('Y-m-d')) }}">

                            @error('tanggalmulai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>


                    {{-- Tanggal Berakhir --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="tanggalberakhir">
                                Tanggal Berakhir
                            </label>

                            <input
                                type="date"
                                name="tanggalberakhir"
                                id="tanggalberakhir"
                                class="form-control @error('tanggalberakhir') is-invalid @enderror"
                                value="{{ old('tanggalberakhir', optional($satuanPendidikan->tanggalberakhir)->format('Y-m-d')) }}">

                            @error('tanggalberakhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- STATUS --}}
                {{-- ================================================= --}}

                <h5 class="text-primary mt-4 mb-3">
                    <i class="fas fa-toggle-on mr-1"></i>
                    Status
                </h5>


                <div class="form-group">

                    <div class="custom-control custom-switch">

                        <input
                            type="checkbox"
                            name="aktif"
                            value="1"
                            class="custom-control-input"
                            id="aktif"
                            {{ old('aktif', $satuanPendidikan->aktif) ? 'checked' : '' }}>

                        <label
                            class="custom-control-label"
                            for="aktif">
                            Satuan Pendidikan Aktif
                        </label>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- FOOTER --}}
            {{-- ========================================================= --}}

            <div class="card-footer d-flex justify-content-between">

                <a
                    href="{{ route('petugas.satuanpendidikan.show', $satuanPendidikan->id) }}"
                    class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Kembali
                </a>


                <button
                    type="submit"
                    class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection