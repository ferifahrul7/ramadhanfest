<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController as Controller;
use App\Models\Transaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bcrum = $this->bcrum('Home');
        $pengunjung['in'] = Transaksi::where('status','in')->sum('jumlah_peserta');
        $pengunjung['daftar'] = Transaksi::where('status','pendaftaran')->sum('jumlah_peserta');
        $pengunjung['out'] = Transaksi::where('status','out')->sum('jumlah_peserta');
        return view('backend.home', compact('bcrum','pengunjung'));
    }
}
