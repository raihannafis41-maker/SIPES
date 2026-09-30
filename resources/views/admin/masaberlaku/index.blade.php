@extends('layouts.admin')

@section('title', 'Masa Berlaku')

@section('judul', 'Masa Berlaku')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card card-primary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-calendar-alt mr-2"></i>

                    Data Masa Berlaku

                </h3>

            </div>


            <div class="card-body">

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
                                    Satuan Pendidikan
                                </th>

                                <th>
                                    Kepala Sekolah
                                </th>

                                <th>
                                    Tanggal Mulai
                                </th>

                                <th>
                                    Tanggal Berakhir
                                </th>

                                <th class="text-center">
                                    Status
                                </th>

                                <th class="text-center">
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
                                        {{ $satuanPendidikan->kepalasekolah }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($satuanPendidikan->tanggalmulai)->format('d-m-Y') }}
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
                                            href="{{ route('admin.masaberlaku.show', $satuanPendidikan->id) }}"
                                            class="btn btn-info btn-sm"
                                            title="Detail"
                                        >

                                            <i class="fas fa-eye"></i>

                                        </a>

                                        <a
                                            href="{{ route('admin.masaberlaku.perpanjangan', $satuanPendidikan->id) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Perpanjang"
                                        >

                                            <i class="fas fa-sync-alt"></i>

                                        </a>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="8"
                                        class="text-center text-muted py-4"
                                    >

                                        <i class="fas fa-calendar-times fa-2x mb-2"></i>

                                        <br>

                                        Belum ada data masa berlaku.

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