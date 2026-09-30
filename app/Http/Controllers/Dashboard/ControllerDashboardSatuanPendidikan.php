<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ModelSatuanPendidikan;

class ControllerDashboardSatuanPendidikan extends Controller
{
    public function index()
    {
        $id = session('satuanpendidikan_id');

        $satuanPendidikan = ModelSatuanPendidikan::findOrFail($id);

        return view(
            'satuanpendidikan.dashboard',
            compact('satuanPendidikan')
        );
    }
}