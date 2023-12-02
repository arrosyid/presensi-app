<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CutiController extends Controller
{
    // view table
    function index() {
        $daftar_cuti = Cuti::join('users', 'users.id', '=', 'cuti.user_id')->get();
        return view('daftar-cuti', ['daftar_cuti' => $daftar_cuti]);
    }

    function tambahCuti() {
        return view('tambah-cuti');
    }

    function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'jenis_cuti' => 'required|string',
            'tanggal_mulai' => 'required|string',
            'tanggal_selesai' => 'required|string',
            'keterangan' => 'required|string'
        ]);

        if($validator->fails()){
            // return response()->json($validator->errors());
            return redirect()->back()->withErrors($validator->errors());
        }
        // dd($request);
        Cuti::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'jenis_cuti' => $request->jenis_cuti,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'status' => 'Sedang Diproses'
        ]);

        return redirect()->route('cuti');
    }
}
