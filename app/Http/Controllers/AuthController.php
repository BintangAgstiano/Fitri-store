<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended(); 
        }
        return view('Login');
    }
    public function loginProses(Request $r)
    {
        if (Auth::attempt(['username' => $r->username, 'password' => $r->password])) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        }

        return redirect()->back()->with('error', 'nama atau password salah');
    }

    public function register()
    {
        return view('Register');
    }
    public function registerProses(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'username' => 'required|unique:users,username',
            'password' => 'required'
        ], [
            'username.required' => 'Nama wajib diisi',
            'username.unique' => 'Nama telah tersedia',
            'password.required' => 'Password wajib diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'role' => 'user',
            'username' => $r->username,
            'password' => Hash::make($r->password),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login'); 
    }
}
