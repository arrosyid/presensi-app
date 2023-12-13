<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CutiController extends Controller
{
    // view table
    function index() {
        // $daftar_cuti = Cuti::join('users', 'cuti.user_id', '=', 'users.id')->get();
        $daftar_cuti = DB::table('cuti')->join('users', 'users.id', '=', 'cuti.user_id' )->select('cuti.*', 'users.name', 'users.email', 'users.type')->get();
        // dd($daftar_cuti);
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

    public function destroy($id){
        // Cuti::destroy(decrypt($id));

        $post = Cuti::findOrFail(decrypt($id));
        $post->delete();

        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // $data = User::latest()->get();
        if (Auth::user()->type = 'admin') {
            $cuti = 'admin.cuti';
        }else if (Auth::user()->type = 'user'){
            $cuti = 'cuti';
        }

        return redirect()->route($cuti)->with(['success' => 'user berhasil dihapus!']);
    }

    public function edit($id) {
        $cuti = Cuti::where('id', $id)->get()->first();
        return view('edit-cuti', compact('cuti'));
    }

    public function updateCuti(Request $request) {
        $cuti = Cuti::findOrFail($request->id);
        dd($cuti);

        $cuti->update($request->all());
        return redirect()->route('cuti')
        ->with('success', 'Data Cuti telah berhasil diubah.');
    }

    // public function update($data){
    //     // Cuti::destroy(decrypt($id));

    //     // $post = Cuti::findOrFail(decrypt($id));
    //     // $post->delete();

    //     // Alert::success('Berhasil', 'Data Berhasil Dihapus');
    //     // $data = User::latest()->get();
    //     return redirect()->route('cuti')->with(['success' => 'user berhasil dihapus!']);
    // }

}
