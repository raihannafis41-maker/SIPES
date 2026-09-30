@extends('layouts.admin')

@section('title', 'Detail Masa Berlaku')

@section('judul', 'Detail Masa Berlaku')

@section('content')

<div class="row">

    <div class="col-md-5">

        <div class="card card-primary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-school mr-2"></i>

                    Informasi Satuan Pendidikan

                </h3>

            </div>


            <div class="card-body">

                <table class="table table-bordered">

                    <tr>

                        <th width="40%">
                            NPSN
                        </th>

                        <td>
                            <strong>
                                {{ $satuanPendidikan->npsn }}
                            </strong>
                        </td>

                    </tr>


                    <tr>

                        <th>
                            Nama
                        </th>

                        <td>
                            {{ $satuanPendidikan->nama }}
                        </td>

                    </tr>


                    <tr>

                        <th>
                            Kepala Sekolah
                        </th>

                        <td>
                            {{ $satuanPendidikan->kepalasekolah }}
                        </td>

                    </tr>


                    <tr>

                        <th>
                            Tanggal Mulai
                        </th>

                        <td>

                            {{ \Carbon\Carbon::parse(
                                $satuanPendidikan->tanggalmulai
                            )->format('d-m-Y') }}

                        </td>

                    </tr>


                    <tr>

                        <th>
                            Tanggal Berakhir
                        </th>

                        <td>

                            {{ \Carbon\Carbon::parse(
                                $satuanPendidikan->tanggalberakhir
                            )->format('d-m-Y') }}

                        </td>

                    </tr>

                </table>

            </div>


            <div class="card-footer">

                <a
                    href="{{ route('admin.masaberlaku.index') }}"
                    class="btn btn-secondary"
                >

                    <i class="fas fa-arrow-left mr-1"></i>

                    Kembali

                </a>


                <a
                    href="{{ route(
                        'admin.masaberlaku.perpanjangan',
                        $satuanPendidikan->id
                    ) }}"
                    class="btn btn-warning float-right"
                >

                    <i class="fas fa-sync-alt mr-1"></i>

                    Perpanjang

                </a>

            </div>

        </div>

    </div>


    {{-- RIWAYAT --}}

    <div class="col-md-7">

        <div class="card card-info card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-history mr-2"></i>

                    Riwayat Masa Berlaku

                </h3>

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="thead-light">

                            <tr>

                                <th class="text-center">
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

                            </tr>

                        </thead>


                        <tbody>

                            @forelse(
                                $riwayatMasaBerlaku
                                as $riwayat
                            )

                                <tr>

                                    <td class="text-center">

                                        {{ $loop->iteration }}

                                    </td>


                                    <td>

                                        {{ \Carbon\Carbon::parse(
                                            $riwayat->tanggalmulai
                                        )->format('d-m-Y') }}

                                    </td>


                                    <td>

                                        {{ \Carbon\Carbon::parse(
                                            $riwayat->tanggalberakhir
                                        )->format('d-m-Y') }}

                                    </td>


                                    <td>

                                        {{ \Carbon\Carbon::parse(
                                            $riwayat->tanggalperpanjangan
                                        )->format('d-m-Y') }}

                                    </td>


                                    <td>

                                        {{ $riwayat->keterangan ?: '-' }}

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="text-center text-muted py-4"
                                    >

                                        <i class="fas fa-history fa-2x mb-2"></i>

                                        <br>

                                        Belum ada riwayat perpanjangan.

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