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

    function create(Request $request)
    {
        return view('create-user');
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'type' => 'required',
            'password_confirmation' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            // return response()->json($validator->errors());
            return redirect()->back()->withErrors($validator->errors());
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user');
    }
}
