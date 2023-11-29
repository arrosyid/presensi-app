<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $users = User::get();
        return view('user', [
            'users' =>$users
        ]);
    }

    function create()
    {
        return view('create-user');
    }

    function store(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8'
        // ]);
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors());
        // }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        // return redirect()->route('user');
        return redirect()->action('App\Http\Controllers\UserController@index');
    }
}
