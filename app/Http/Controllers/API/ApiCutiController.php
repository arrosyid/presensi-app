<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiCutiController extends Controller
{
    // fungsi pengajuan cuti
    function pengajuanCuti(Request $request) {
        $presensi = Cuti::create([
            'user_id' => Auth::user()->id,
            'tanggal_mulai' => date('Y-m-d'),
            'tanggal_selesai' => date('Y-m-d'),
            'jenis_cuti' => $request->jenis_cuti,
            'keterangan' => $request->keterangan,
            'status' => 'sedang diproses',
        ]);

    }
}
