@extends('layouts.admin')

@section('title', 'Perpanjangan Masa Berlaku')

@section('judul', 'Perpanjangan Masa Berlaku')

@section('content')

<div class="row">

    <div class="col-md-8">

        <div class="card card-warning card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-sync-alt mr-2"></i>

                    Perpanjangan Masa Berlaku

                </h3>

            </div>


            <form
                action="{{ route('admin.masaberlaku.simpan', $satuanPendidikan->id) }}"
                method="POST"
            >

                @csrf

                <div class="card-body">

                    {{-- Satuan Pendidikan --}}

                    <div class="form-group">

                        <label>
                            Satuan Pendidikan
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $satuanPendidikan->nama }}"
                            readonly
                        >

                    </div>


                    {{-- NPSN --}}

                    <div class="form-group">

                        <label>
                            NPSN
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $satuanPendidikan->npsn }}"
                            readonly
                        >

                    </div>


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
                                    value="{{ old(
                                        'tanggalmulai',
                                        optional($satuanPendidikan->tanggalmulai)->format('Y-m-d')
                                    ) }}"
                                    required
                                >

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
                                    value="{{ old(
                                        'tanggalberakhir',
                                        optional($satuanPendidikan->tanggalberakhir)->format('Y-m-d')
                                    ) }}"
                                    required
                                >

                                @error('tanggalberakhir')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- Tanggal Perpanjangan --}}

                    <div class="form-group">

                        <label for="tanggalperpanjangan">
                            Tanggal Perpanjangan
                        </label>

                        <input
                            type="date"
                            name="tanggalperpanjangan"
                            id="tanggalperpanjangan"
                            class="form-control @error('tanggalperpanjangan') is-invalid @enderror"
                            value="{{ old(
                                'tanggalperpanjangan',
                                now()->format('Y-m-d')
                            ) }}"
                            required
                        >

                        @error('tanggalperpanjangan')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Keterangan --}}

                    <div class="form-group">

                        <label for="keterangan">
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            id="keterangan"
                            rows="4"
                            class="form-control @error('keterangan') is-invalid @enderror"
                            placeholder="Masukkan keterangan perpanjangan..."
                        >{{ old('keterangan') }}</textarea>

                        @error('keterangan')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                <div class="card-footer">

                    <a
                        href="{{ route(
                            'admin.masaberlaku.show',
                            $satuanPendidikan->id
                        ) }}"
                        class="btn btn-secondary"
                    >

                        <i class="fas fa-arrow-left mr-1"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="btn btn-warning float-right"
                    >

                        <i class="fas fa-save mr-1"></i>

                        Simpan Perpanjangan

                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- Informasi Saat Ini --}}

    <div class="col-md-4">

        <div class="card card-info card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-info-circle mr-2"></i>

                    Masa Berlaku Saat Ini

                </h3>

            </div>


            <div class="card-body">

                <strong>
                    Tanggal Mulai
                </strong>

                <p class="text-muted">

                    {{ \Carbon\Carbon::parse(
                        $satuanPendidikan->tanggalmulai
                    )->format('d-m-Y') }}

                </p>


                <strong>
                    Tanggal Berakhir
                </strong>

                <p class="text-muted">

                    {{ \Carbon\Carbon::parse(
                        $satuanPendidikan->tanggalberakhir
                    )->format('d-m-Y') }}

                </p>


                <hr>


                <strong>
                    Kepala Sekolah
                </strong>

                <p class="text-muted">

                    {{ $satuanPendidikan->kepalasekolah }}

                </p>

            </div>

        </div>

    </div>

</div>

@endsection