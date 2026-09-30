@extends('layouts.admin')

@section('title', 'Detail Satuan Pendidikan')

@section('content')
<div class="container-fluid">

    @php
        $tanggalMulai = \Carbon\Carbon::parse(
            $satuanPendidikan->tanggalmulai
        );

        $tanggalBerakhir = \Carbon\Carbon::parse(
            $satuanPendidikan->tanggalberakhir
        );

        if ($tanggalBerakhir->isPast()) {
            $status = 'Berakhir';
            $badge = 'danger';
        } elseif ($tanggalBerakhir->diffInDays(now()) <= 30) {
            $status = 'Segera Berakhir';
            $badge = 'warning';
        } else {
            $status = 'Aktif';
            $badge = 'success';
        }
    @endphp

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                Detail Satuan Pendidikan
            </h3>

            <div class="card-tools">
                <a
                    href="{{ route('admin.satuanpendidikan.index') }}"
                    class="btn btn-secondary btn-sm"
                >
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>

        <div class="card-body">

            <h3>
                {{ $satuanPendidikan->nama }}
            </h3>

            <p class="text-muted">
                NPSN: {{ $satuanPendidikan->npsn }}
            </p>

            <hr>

            <div class="row">

                <div class="col-md-6">

                    <table class="table table-bordered">

                        <tr>
                            <th width="40%">NPSN</th>
                            <td>{{ $satuanPendidikan->npsn }}</td>
                        </tr>

                        <tr>
                            <th>Nama</th>
                            <td>{{ $satuanPendidikan->nama }}</td>
                        </tr>

                        <tr>
                            <th>Jenis</th>
                            <td>{{ $satuanPendidikan->jenis }}</td>
                        </tr>

                        <tr>
                            <th>Yayasan</th>
                            <td>{{ $satuanPendidikan->yayasan ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Kepala Sekolah</th>
                            <td>{{ $satuanPendidikan->kepalasekolah }}</td>
                        </tr>

                        <tr>
                            <th>Nomor WhatsApp</th>
                            <td>{{ $satuanPendidikan->nomorwhatsapp }}</td>
                        </tr>

                    </table>

                </div>

                <div class="col-md-6">

                    <table class="table table-bordered">

                        <tr>
                            <th width="40%">Alamat</th>
                            <td>{{ $satuanPendidikan->alamat }}</td>
                        </tr>

                        <tr>
                            <th>Desa</th>
                            <td>{{ $satuanPendidikan->desa }}</td>
                        </tr>

                        <tr>
                            <th>Kecamatan</th>
                            <td>{{ $satuanPendidikan->kecamatan }}</td>
                        </tr>

                        <tr>
                            <th>Kabupaten</th>
                            <td>{{ $satuanPendidikan->kabupaten }}</td>
                        </tr>

                        <tr>
                            <th>Provinsi</th>
                            <td>{{ $satuanPendidikan->provinsi }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge badge-{{ $badge }}">
                                    {{ $status }}
                                </span>
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

            <hr>

            <h5>
                Masa Berlaku
            </h5>

            <div class="row">

                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info">
                            <i class="fas fa-calendar-alt"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                Tanggal Mulai
                            </span>

                            <span class="info-box-number">
                                {{ $tanggalMulai->format('d-m-Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger">
                            <i class="fas fa-calendar-times"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                Tanggal Berakhir
                            </span>

                            <span class="info-box-number">
                                {{ $tanggalBerakhir->format('d-m-Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-{{ $badge }}">
                            <i class="fas fa-info-circle"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                Status
                            </span>

                            <span class="info-box-number">
                                {{ $status }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection