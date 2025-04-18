<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function adminDashboard()
    {
        $user = Auth::user();
        if ($user->role == 'user') {
            return redirect('/');
        }
        $data = Pesanan::get();
        $total = count($data);
        return view('web-admin.dashboard', compact('total'));
    }
    public function pesananAdmin()
    {
        $user = Auth::user();
        if ($user->role == 'user') {
            return redirect('/');
        }
        $data = Pesanan::get();
        return view('web-admin.pesanan', compact('data'));
    }
    public function profileAdmin()
    {
        $user = Auth::user();
        if ($user->role == 'user') {
            return redirect('/');
        }
        return view('web-admin.profile', compact('user'));
    }
    public function terima($id)
    {
        $data =  Pesanan::where('id', $id)->first();
        $data->status = 'Pesanan diterima';
        $data->estimasi = Carbon::parse($data->tanggal_pesan)->addDays(5);
        $data->save();

        return redirect()->back()->with('success', 'Pesanan berhasil di terima');
    }
    public function tolak($id)
    {
        $data =  Pesanan::where('id', $id)->first();
        $data->status = 'Pesanan ditolak';
        $data->save();

        return redirect()->back()->with('success', 'Pesanan berhasil di tolak');
    }
    public function updateProfile(Request $r)
    {
        $user = Auth::user();
        $data = User::where('username', $user->username)->first();
        if (!empty($r->username)) {
            $data->username = $r->username;
            $data->save();
        }
        if (!empty($r->password)) {
            $data->password = Hash::make($r->password);
            $data->save();
        }
        return redirect()->back()->with('success', 'Berhasil di update');
    }
}
