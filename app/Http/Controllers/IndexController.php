<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Produk;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        if($user->role=='admin'){
            return redirect('/dashboard');
        }
        $data = Produk::get();
        return view('Index', compact('data'));
    }

    public function detail($id)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/dashboard');
        }
        $item = Produk::where('id', $id)->first();
        $data = Produk::inRandomOrder()->take(3)->get();
        return view('DetailProduct', compact('item', 'data'));
    }

    public function addCart(Request $r)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/dashboard');
        }
        Keranjang::create([
            'user_id' => $user->id,
            'title' => $r->title,
            'foto_produk' => $r->foto_produk,
            'uk' => $r->uk,
            'harga' => $r->harga,
            'jumlah_pesanan' => $r->jumlah_pesanan,
            'sub_title' => 'Tampil beda dengan sentuhan lokal yang penuh makna!',
        ]);
        return redirect()->back()->with('success', 'Berhasil di tambahkan');
    }

    public function keranjang()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/dashboard');
        }
        $user = Auth::user();
        $data = Keranjang::where('user_id', $user->id)->get();
        return view('keranjang', compact('data'));
    }

    public function keranjangDelete($id)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/dashboard');
        }
        Keranjang::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil di hapus');
    }

    public function pesananAdd(Request $r)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/dashboard');
        }
        $user = Auth::user();
        $file = $r->file('bukti_pembayaran');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('bukti_pembayaran'), $fileName);
        Pesanan::create([
            'user_id' => $user->id,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'bukti_pembayaran' => $fileName,
            'tanggal_pesan' =>  date('Y-m-d'),
            'estimasi' => '-',
            'status' => 'Menunggu',
            'uk' => $r->uk,
            'title' => $r->title,
            'foto_produk' => $r->foto_produk,
            'jumlah_pesanan' => $r->jumlah_pesanan,
            'harga' => $r->harga,
            'nama_lengkap' => $r->nama_lengkap,
        ]);


        return redirect('/riwayat-pembelian');
    }

    public function riwayatPembelian()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/dashboard');
        }
        $user = Auth::user();
       $data= Pesanan::where('user_id', $user->id)->get();
        return view('riwayatPembelian',compact('data'));
    }
}
