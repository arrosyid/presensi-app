<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiCutiController extends Controller
{
    function index() {
        $cuti = Cuti::where('user_id', Auth::user()->id)->get();

        // foreach($cuti as $item) {
        //     if ($item->tanggal == date('Y-m-d')) {
        //         $item->is_hari_ini = true;
        //     } else {
        //         $item->is_hari_ini = false;
        //     }
        //     $datetime = Carbon::parse($item->tanggal)->locale('id');
        //     $masuk = Carbon::parse($item->masuk)->locale('id');
        //     $pulang = Carbon::parse($item->pulang)->locale('id');

        //     $datetime->settings(['formatFunction' => 'translatedFormat']);
        //     $masuk->settings(['formatFunction' => 'translatedFormat']);
        //     $pulang->settings(['formatFunction' => 'translatedFormat']);

        //     $item->tanggal = $datetime->format('l, j F Y');
        //     $item->masuk = $masuk->format('H:i');
        //     $item->pulang = $pulang->format('H:i');
        // }

        return response()->json([
            'success' => true,
            'data' => $cuti,
            'message' => 'Sukses menampilkan data'
        ]);
    }
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
