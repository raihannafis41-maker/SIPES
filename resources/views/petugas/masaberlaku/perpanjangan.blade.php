@extends('layouts.petugas')

@section('title', 'Perpanjang Masa Berlaku')

@section('content')

<div class="container-fluid">

    <div class="row mb-3">

        <div class="col-12">

            <h1 class="h3 mb-1">
                <i class="fas fa-sync-alt mr-2"></i>
                Perpanjang Masa Berlaku
            </h1>

            <p class="text-muted mb-0">
                Perbarui masa berlaku satuan pendidikan.
            </p>

        </div>

    </div>


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

                    </table>

                </div>


                <div class="col-md-6">

                    <table class="table table-borderless">

                        <tr>

                            <th width="180">
                                Tanggal Mulai Saat Ini
                            </th>

                            <td>
                                :

                                @if ($satuanPendidikan->tanggalmulai)

                                {{ $satuanPendidikan->tanggalmulai->format('d-m-Y') }}

                                @else

                                -

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Tanggal Berakhir Saat Ini
                            </th>

                            <td>
                                :

                                @if ($satuanPendidikan->tanggalberakhir)

                                <strong>
                                    {{ $satuanPendidikan->tanggalberakhir->format('d-m-Y') }}
                                </strong>

                                @else

                                -

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Status
                            </th>

                            <td>
                                :

                                @if ($satuanPendidikan->status_masa_berlaku == 'Sudah Berakhir')

                                <span class="badge badge-danger">
                                    Sudah Berakhir
                                </span>

                                @elseif ($satuanPendidikan->status_masa_berlaku == 'Segera Berakhir')

                                <span class="badge badge-warning">
                                    Segera Berakhir
                                </span>

                                @elseif ($satuanPendidikan->status_masa_berlaku == 'Masih Berlaku')

                                <span class="badge badge-success">
                                    Masih Berlaku
                                </span>

                                @else

                                <span class="badge badge-secondary">
                                    Belum Ditentukan
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
    {{-- FORM --}}
    {{-- ========================================================= --}}

    <div class="card card-warning">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-calendar-plus mr-1"></i>

                Data Perpanjangan

            </h3>

        </div>


        <form>

            <div class="card-body">

                <div class="alert alert-info">

                    <i class="fas fa-info-circle mr-1"></i>

                    Silakan masukkan tanggal masa berlaku yang baru.
                    Data perpanjangan akan disimpan sebagai riwayat.

                </div>


                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                class="form-control"
                                value="{{ optional($satuanPendidikan->tanggalberakhir)->format('Y-m-d') }}">

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="form-group">

                            <label>
                                Tanggal Berakhir
                            </label>

                            <input
                                type="date"
                                class="form-control">

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="form-group">

                            <label>
                                Tanggal Perpanjangan
                            </label>

                            <input
                                type="date"
                                class="form-control"
                                value="{{ now()->format('Y-m-d') }}">

                        </div>

                    </div>

                </div>


                <div class="form-group">

                    <label>
                        Keterangan
                    </label>

                    <textarea
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan keterangan perpanjangan..."></textarea>

                </div>

            </div>


            <div class="card-footer d-flex justify-content-between">

                <a
                    href="{{ route('petugas.masaberlaku.show', $satuanPendidikan->id) }}"
                    class="btn btn-secondary">

                    <i class="fas fa-arrow-left mr-1"></i>

                    Kembali

                </a>


                <button
                    type="button"
                    class="btn btn-warning"
                    disabled>

                    <i class="fas fa-save mr-1"></i>

                    Simpan Perpanjangan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection