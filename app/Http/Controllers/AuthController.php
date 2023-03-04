<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class AuthController extends Controller
{

    function __construct()
    {
        
        if (Auth::check()) redirect('/');
    }

    function login(Request $request)
    {
        return view('login');
    }

    function register()
    {
        return view('register');
    }

    function postRegister(Request $request)
    {
        if($request->password !== $request->password_confirm)
        {
            Session::flash('danger', 'Password Konfirmasi tidak sama.');
            return redirect('/register');
        } 

        if(User::where(['email'=>$request->email])->get()->count() !== 0){
            Session::flash('danger', 'Email sudah terdaftar.');
            return redirect('/register');
        }

        $register = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($register) Session::flash('success', 'Register berhasil');
        else Session::flash('danger', 'Register gagal');
        return redirect('/register');
    }

    function postLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data))
        {
            session([
                'email' => Auth::user()->email,
                'id' => Auth::user()->id,
                'admin' => 1,
            ]);
            return redirect('/');
        }
        
        Session::flash('danger', 'Email atau Password Salah');
        return redirect('/login');
    }

    function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}