<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    // view table
    function index() {
        $daftar_cuti = Cuti::join('users', 'users.id', '=', 'cuti.user_id')->get();
        return view('pengajuan-cuti', ['daftar_cuti' => $daftar_cuti]);
    }

    // function tambahCuti() {
    //     return view('pengajuan-cuti', ['daftar_cuti' => $daftar_cuti]);
    // }
}
