@extends('layouts.admin')

@section('title', 'Satuan Pendidikan')

@section('judul', 'Satuan Pendidikan')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card card-primary card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-school mr-2"></i>
                    Data Satuan Pendidikan
                </h3>

                <div class="card-tools">
                    <a href="#" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i>
                        Tambah
                    </a>
                </div>
            </div>

            <div class="card-body">

                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        <button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-label="Tutup"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <i class="fas fa-check-circle mr-1"></i>
                        {{ session('success') }}

                    </div>

                @endif


                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show">

                        <button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-label="Tutup"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <i class="fas fa-exclamation-circle mr-1"></i>
                        {{ session('error') }}

                    </div>

                @endif


                <div class="table-responsive">

                    <table class="table table-bordered table-hover table-striped">

                        <thead class="thead-light">

                            <tr>

                                <th class="text-center" width="50">
                                    No
                                </th>

                                <th>
                                    NPSN
                                </th>

                                <th>
                                    Nama Satuan Pendidikan
                                </th>

                                <th>
                                    Jenis
                                </th>

                                <th>
                                    Kepala Sekolah
                                </th>

                                <th>
                                    Tanggal Berakhir
                                </th>

                                <th class="text-center">
                                    Status
                                </th>

                                <th class="text-center" width="100">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($dataSatuanPendidikan as $satuanPendidikan)

                                @php

                                    $tanggalBerakhir = \Carbon\Carbon::parse(
                                        $satuanPendidikan->tanggalberakhir
                                    );

                                    if ($tanggalBerakhir->isPast()) {

                                        $status = 'Berakhir';
                                        $badge = 'danger';

                                    } elseif (
                                        now()->diffInDays(
                                            $tanggalBerakhir,
                                            false
                                        ) <= 30
                                    ) {

                                        $status = 'Segera Berakhir';
                                        $badge = 'warning';

                                    } else {

                                        $status = 'Aktif';
                                        $badge = 'success';

                                    }

                                @endphp


                                <tr>

                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <strong>
                                            {{ $satuanPendidikan->npsn }}
                                        </strong>
                                    </td>

                                    <td>
                                        {{ $satuanPendidikan->nama }}
                                    </td>

                                    <td>
                                        {{ $satuanPendidikan->jenis }}
                                    </td>

                                    <td>
                                        {{ $satuanPendidikan->kepalasekolah }}
                                    </td>

                                    <td>
                                        {{ $tanggalBerakhir->format('d-m-Y') }}
                                    </td>

                                    <td class="text-center">

                                        <span class="badge badge-{{ $badge }}">
                                            {{ $status }}
                                        </span>

                                    </td>

                                    <td class="text-center">

                                        <a
                                            href="{{ route('admin.satuanpendidikan.detail', $satuanPendidikan->id) }}"
                                            class="btn btn-info btn-sm"
                                            title="Detail"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </a>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="8"
                                        class="text-center text-muted py-4"
                                    >

                                        <i class="fas fa-school fa-2x mb-2"></i>

                                        <br>

                                        Belum ada data satuan pendidikan.

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