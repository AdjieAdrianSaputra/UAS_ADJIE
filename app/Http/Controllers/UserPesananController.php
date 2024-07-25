<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class UserPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('user_id', Auth::id())->get();
        return view('user.pesanan', compact('pesanan'));
    }
}
