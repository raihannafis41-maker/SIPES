<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ModelSatuanPendidikan;
use Illuminate\Http\Request;

class ControllerSatuanPendidikan extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $dataSatuanPendidikan = ModelSatuanPendidikan::orderBy(
            'nama',
            'asc'
        )->get();

        return view(
            'admin.satuanpendidikan.index',
            compact('dataSatuanPendidikan')
        );
    }

    public function show($id)
    {
        $satuanPendidikan = ModelSatuanPendidikan::findOrFail($id);

        return view(
            'admin.satuanpendidikan.detail',
            compact('satuanPendidikan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PETUGAS
    |--------------------------------------------------------------------------
    */

    public function indexPetugas(Request $request)
    {
        $query = ModelSatuanPendidikan::query();

        /*
        |--------------------------------------------------------------------------
        | PENCARIAN
        |--------------------------------------------------------------------------
        */

        if ($request->filled('cari')) {
            $cari = $request->cari;

            $query->where(function ($q) use ($cari) {
                $q->where('nama', 'like', '%' . $cari . '%')
                    ->orWhere('npsn', 'like', '%' . $cari . '%')
                    ->orWhere('kepalasekolah', 'like', '%' . $cari . '%');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER JENIS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('jenis')) {
            $query->where(
                'jenis',
                $request->jenis
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER KECAMATAN
        |--------------------------------------------------------------------------
        */

        if ($request->filled('kecamatan')) {
            $query->where(
                'kecamatan',
                $request->kecamatan
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $dataSatuanPendidikan = $query
            ->orderBy('nama', 'asc')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | DATA UNTUK FILTER
        |--------------------------------------------------------------------------
        */

        $daftarJenis = ModelSatuanPendidikan::query()
            ->whereNotNull('jenis')
            ->where('jenis', '!=', '')
            ->select('jenis')
            ->distinct()
            ->orderBy('jenis')
            ->pluck('jenis');

        $daftarKecamatan = ModelSatuanPendidikan::query()
            ->whereNotNull('kecamatan')
            ->where('kecamatan', '!=', '')
            ->select('kecamatan')
            ->distinct()
            ->orderBy('kecamatan')
            ->pluck('kecamatan');

        return view(
            'petugas.satuanpendidikan.index',
            compact(
                'dataSatuanPendidikan',
                'daftarJenis',
                'daftarKecamatan'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL PETUGAS
    |--------------------------------------------------------------------------
    */

    public function showPetugas($id)
    {
        $satuanPendidikan = ModelSatuanPendidikan::findOrFail($id);

        return view(
            'petugas.satuanpendidikan.show',
            compact('satuanPendidikan')
        );
    }
    /*
|--------------------------------------------------------------------------
| TAMBAH SATUAN PENDIDIKAN PETUGAS
|--------------------------------------------------------------------------
*/

    public function createPetugas()
    {
        return view('petugas.satuanpendidikan.create');
    }


    /*
|--------------------------------------------------------------------------
| SIMPAN SATUAN PENDIDIKAN PETUGAS
|--------------------------------------------------------------------------
*/

    public function storePetugas(Request $request)
    {
        $request->validate([
            'npsn' => [
                'required',
                'string',
                'max:20',
                'unique:satuanpendidikan,npsn',
            ],

            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'jenis' => [
                'required',
                'string',
                'max:100',
            ],

            'yayasan' => [
                'nullable',
                'string',
                'max:255',
            ],

            'kepalasekolah' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nomorwhatsapp' => [
                'nullable',
                'string',
                'max:30',
            ],

            'alamat' => [
                'nullable',
                'string',
                'max:500',
            ],

            'desa' => [
                'nullable',
                'string',
                'max:100',
            ],

            'kecamatan' => [
                'nullable',
                'string',
                'max:100',
            ],

            'kabupaten' => [
                'nullable',
                'string',
                'max:100',
            ],

            'provinsi' => [
                'nullable',
                'string',
                'max:100',
            ],

            'latitude' => [
                'nullable',
                'numeric',
            ],

            'longitude' => [
                'nullable',
                'numeric',
            ],

            'tanggalmulai' => [
                'nullable',
                'date',
            ],

            'tanggalberakhir' => [
                'nullable',
                'date',
                'after_or_equal:tanggalmulai',
            ],

            'aktif' => [
                'nullable',
                'boolean',
            ],

        ], [

            'npsn.required' =>
            'NPSN wajib diisi.',

            'npsn.unique' =>
            'NPSN sudah terdaftar.',

            'nama.required' =>
            'Nama satuan pendidikan wajib diisi.',

            'jenis.required' =>
            'Jenis satuan pendidikan wajib dipilih.',

            'tanggalberakhir.after_or_equal' =>
            'Tanggal berakhir harus sama atau setelah tanggal mulai.',

        ]);

        ModelSatuanPendidikan::create([
            'npsn' => $request->npsn,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'yayasan' => $request->yayasan,
            'kepalasekolah' => $request->kepalasekolah,
            'nomorwhatsapp' => $request->nomorwhatsapp,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalberakhir' => $request->tanggalberakhir,
            'aktif' => $request->boolean('aktif'),
        ]);

        return redirect()
            ->route('petugas.satuanpendidikan.index')
            ->with(
                'success',
                'Satuan pendidikan berhasil ditambahkan.'
            );
    }


    /*
|--------------------------------------------------------------------------
| EDIT SATUAN PENDIDIKAN PETUGAS
|--------------------------------------------------------------------------
*/

    public function editPetugas($id)
    {
        $satuanPendidikan =
            ModelSatuanPendidikan::findOrFail($id);

        return view(
            'petugas.satuanpendidikan.edit',
            compact('satuanPendidikan')
        );
    }


    /*
|--------------------------------------------------------------------------
| UPDATE SATUAN PENDIDIKAN PETUGAS
|--------------------------------------------------------------------------
*/

    public function updatePetugas(
        Request $request,
        $id
    ) {
        $satuanPendidikan =
            ModelSatuanPendidikan::findOrFail($id);

        $request->validate([

            'npsn' => [
                'required',
                'string',
                'max:20',
                'unique:satuanpendidikan,npsn,' . $id,
            ],

            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'jenis' => [
                'required',
                'string',
                'max:100',
            ],

            'yayasan' => [
                'nullable',
                'string',
                'max:255',
            ],

            'kepalasekolah' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nomorwhatsapp' => [
                'nullable',
                'string',
                'max:30',
            ],

            'alamat' => [
                'nullable',
                'string',
                'max:500',
            ],

            'desa' => [
                'nullable',
                'string',
                'max:100',
            ],

            'kecamatan' => [
                'nullable',
                'string',
                'max:100',
            ],

            'kabupaten' => [
                'nullable',
                'string',
                'max:100',
            ],

            'provinsi' => [
                'nullable',
                'string',
                'max:100',
            ],

            'latitude' => [
                'nullable',
                'numeric',
            ],

            'longitude' => [
                'nullable',
                'numeric',
            ],

            'tanggalmulai' => [
                'nullable',
                'date',
            ],

            'tanggalberakhir' => [
                'nullable',
                'date',
                'after_or_equal:tanggalmulai',
            ],

            'aktif' => [
                'nullable',
                'boolean',
            ],

        ], [

            'npsn.required' =>
            'NPSN wajib diisi.',

            'npsn.unique' =>
            'NPSN sudah digunakan oleh satuan pendidikan lain.',

            'nama.required' =>
            'Nama satuan pendidikan wajib diisi.',

            'jenis.required' =>
            'Jenis satuan pendidikan wajib dipilih.',

            'tanggalberakhir.after_or_equal' =>
            'Tanggal berakhir harus sama atau setelah tanggal mulai.',

        ]);

        $satuanPendidikan->update([

            'npsn' => $request->npsn,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'yayasan' => $request->yayasan,
            'kepalasekolah' => $request->kepalasekolah,
            'nomorwhatsapp' => $request->nomorwhatsapp,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalberakhir' => $request->tanggalberakhir,
            'aktif' => $request->boolean('aktif'),

        ]);

        return redirect()
            ->route(
                'petugas.satuanpendidikan.show',
                $id
            )
            ->with(
                'success',
                'Data satuan pendidikan berhasil diperbarui.'
            );
    }
}
