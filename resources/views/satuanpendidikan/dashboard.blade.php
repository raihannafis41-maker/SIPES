@extends('layouts.satuanpendidikan')

@section('title', 'Dashboard Satuan Pendidikan')

@section('judul', 'Dashboard Satuan Pendidikan')


@section('content')


<!-- ================= IDENTITAS ================= -->

<div class="row">


    <div class="col-md-8">

        <div class="card card-primary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-school mr-1"></i>

                    Informasi Satuan Pendidikan

                </h3>

            </div>


            <div class="card-body">


                <div class="row">

                    <div class="col-md-6">

                        <strong>
                            NPSN
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->npsn }}

                        </p>

                    </div>


                    <div class="col-md-6">

                        <strong>
                            Nama Satuan Pendidikan
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->nama }}

                        </p>

                    </div>


                    <div class="col-md-6">

                        <strong>
                            Jenis
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->jenis }}

                        </p>

                    </div>


                    <div class="col-md-6">

                        <strong>
                            Kepala Sekolah
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->kepalasekolah }}

                        </p>

                    </div>


                    <div class="col-md-6">

                        <strong>
                            Yayasan
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->yayasan ?? '-' }}

                        </p>

                    </div>


                    <div class="col-md-6">

                        <strong>
                            Nomor WhatsApp
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->nomorwhatsapp ?? '-' }}

                        </p>

                    </div>

                </div>


                <hr>


                <strong>
                    Alamat
                </strong>

                <p class="text-muted">

                    {{ $satuanPendidikan->alamat ?? '-' }}

                </p>


                <div class="row">

                    <div class="col-md-3">

                        <strong>
                            Desa
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->desa ?? '-' }}

                        </p>

                    </div>


                    <div class="col-md-3">

                        <strong>
                            Kecamatan
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->kecamatan ?? '-' }}

                        </p>

                    </div>


                    <div class="col-md-3">

                        <strong>
                            Kabupaten
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->kabupaten ?? '-' }}

                        </p>

                    </div>


                    <div class="col-md-3">

                        <strong>
                            Provinsi
                        </strong>

                        <p class="text-muted">

                            {{ $satuanPendidikan->provinsi ?? '-' }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= STATUS ================= -->

    <div class="col-md-4">


        <div class="card card-success card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-calendar-check mr-1"></i>

                    Masa Berlaku

                </h3>

            </div>


            <div class="card-body text-center">


                @php

                    $status = $satuanPendidikan->status_masa_berlaku;

                @endphp


                @if($status === 'Masih Berlaku')

                    <div class="mb-3">

                        <i
                            class="fas fa-check-circle text-success"
                            style="font-size: 60px;"
                        ></i>

                    </div>

                    <h4 class="text-success">

                        Masih Berlaku

                    </h4>


                @elseif($status === 'Segera Berakhir')

                    <div class="mb-3">

                        <i
                            class="fas fa-exclamation-triangle text-warning"
                            style="font-size: 60px;"
                        ></i>

                    </div>

                    <h4 class="text-warning">

                        Segera Berakhir

                    </h4>


                @elseif($status === 'Sudah Berakhir')

                    <div class="mb-3">

                        <i
                            class="fas fa-times-circle text-danger"
                            style="font-size: 60px;"
                        ></i>

                    </div>

                    <h4 class="text-danger">

                        Sudah Berakhir

                    </h4>


                @else

                    <div class="mb-3">

                        <i
                            class="fas fa-question-circle text-secondary"
                            style="font-size: 60px;"
                        ></i>

                    </div>

                    <h4 class="text-secondary">

                        Belum Ditentukan

                    </h4>

                @endif


                <hr>


                <div class="text-left">

                    <strong>
                        Tanggal Mulai
                    </strong>

                    <p class="text-muted">

                        {{ $satuanPendidikan->tanggalmulai?->format('d-m-Y') ?? '-' }}

                    </p>


                    <strong>
                        Tanggal Berakhir
                    </strong>

                    <p class="text-muted">

                        {{ $satuanPendidikan->tanggalberakhir?->format('d-m-Y') ?? '-' }}

                    </p>

                </div>


            </div>

        </div>


    </div>


</div>


<!-- ================= INFORMASI TAMBAHAN ================= -->

<div class="row">


    <div class="col-12">

        <div class="callout callout-info">

            <h5>

                <i class="fas fa-info-circle mr-1"></i>

                Informasi

            </h5>

            <p class="mb-0">

                Gunakan menu yang tersedia untuk melihat
                profil, masa berlaku, riwayat, dan notifikasi
                satuan pendidikan.

            </p>

        </div>

    </div>


</div>


@endsection