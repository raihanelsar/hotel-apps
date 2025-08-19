<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BelajarController extends Controller
{

    public function index()
    { {
            $users = User::all();
            $users = User::orderBy('id', 'desc')->get();
            return view('belajar', compact('users'));
        }
        return view('belajar');
    }

    public function getCallName()
    {
        return $this->callName();
    }

    // ✅ TAMBAH
    public function createTambah()
    {
        return view('tambah');
    }
    public function storeTambah(Request $request)
    {
        $hasil = $request->angka1 + $request->angka2;
        return view('tambah', compact('hasil'));
    }

    // ✅ KURANG
    public function createKurang()
    {
        return view('kurang');
    }
    public function storeKurang(Request $request)
    {
        $hasil = $request->angka1 - $request->angka2;
        return view('kurang', compact('hasil'));
    }

    // ✅ KALI
    public function createKali()
    {
        return view('kali');
    }
    public function storeKali(Request $request)
    {
        $hasil = $request->angka1 * $request->angka2;
        return view('kali', compact('hasil'));
    }

    // ✅ BAGI
    public function createBagi()
    {
        return view('bagi');
    }
    public function storeBagi(Request $request)
    {
        $hasil = $request->angka2 != 0 ? $request->angka1 / $request->angka2 : 'Tidak bisa dibagi 0';
        return view('bagi', compact('hasil'));
    }
}
