<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(Auth::user()->type == 'admin'){
            $presensi = Presensi::select('presensi.*', 'users.name')
                        ->join('users', 'presensi.user_id', '=', 'users.id')
                        ->get();
        }else if(Auth::user()->type == 'user'){
            $presensi = Presensi::select('presensi.*', 'users.name')
                            ->join('users', 'presensi.user_id', '=', 'users.id')
                            ->where('users.name', '=', Auth::user()->name)
                            ->get();
        }
        foreach($presensi as $item) {
            $datetime = Carbon::parse($item->tanggal)->locale('id');

            $datetime->settings(['formatFunction' => 'translatedFormat']);

            $item->tanggal = $datetime->format('l, j F Y');
        }
        // dd(Auth::user()->type);
        return view('home', [
            'presensis' => $presensi
        ]);
    }
}
