<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MyController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home')->with('error', 'Stay Here');
        }
        return view('login');
    }


    public function register()
    {
        if (Auth::check()) {
            return redirect('home')->with('error', 'Stay Here');
        }
        return view('register');
    }

    public function myregister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        user::create($data);
        return redirect('login')->with('success', 'Registered, Please Login');
    }


    public function mylogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->intended('home')->with('success', 'Welcome');
        }

        return redirect('login')->with('error', 'Invalid Credentials');
    }

    public function home()
    {
        if (Auth::check()) {
            return view('home');
        };
        return redirect('login')->with('error', 'Not Allowed');
    }

    public function edit()
    {
        if (Auth::check()) {
            return view('edit');
        }
        return redirect('login')->with('error', 'Not Allowed');
    }

    public function myedit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',

        ]);
        $user = Auth::user();

        $data = $request->all();

        $user-> update($data);
        return redirect('home')->with('success', 'Updated');
    }


    public function delete(Request $request)
    {
        $user = Auth::user();

        $user->delete();

        return redirect('register')->with('success', 'Dont do this again');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
