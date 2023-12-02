<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiCutiController extends Controller
{
    function index() {
        $cuti = Cuti::where('user_id', Auth::user()->id)->get();

        foreach($cuti as $item) {
            $tanggal_mulai = Carbon::parse($item->tanggal_mulai)->locale('id');
            $tanggal_selesai = Carbon::parse($item->tanggal_selesai)->locale('id');
            // $masuk = Carbon::parse($item->masuk)->locale('id');
            // $pulang = Carbon::parse($item->pulang)->locale('id');

            $tanggal_mulai->settings(['formatFunction' => 'translatedFormat']);
            $tanggal_selesai->settings(['formatFunction' => 'translatedFormat']);
            // $masuk->settings(['formatFunction' => 'translatedFormat']);
            // $pulang->settings(['formatFunction' => 'translatedFormat']);

            $item->tanggal_mulai = $tanggal_mulai->format('l, j F Y');
            $item->tanggal_selesai = $tanggal_selesai->format('l, j F Y');
            // $item->masuk = $masuk->format('H:i');
            // $item->pulang = $pulang->format('H:i');
        }

        return response()->json([
            'success' => true,
            'data' => $cuti,
            'message' => 'Sukses menampilkan data'
        ]);
    }
    // fungsi pengajuan cuti
    function pengajuanCuti(Request $request) {
        $cuti = Cuti::create([
            'user_id' => Auth::user()->id,
            'tanggal_mulai' => date('Y-m-d'),
            'tanggal_selesai' => date('Y-m-d'),
            'jenis_cuti' => $request->jenis_cuti,
            'keterangan' => $request->keterangan,
            'status' => 'sedang diproses',
        ]);

        return response()->json([
            'success' => true,
            'data' => $cuti,
            'message' => 'Sukses simpan'
        ]);

    }
}
