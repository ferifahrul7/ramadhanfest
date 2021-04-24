<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    
    public function handleTransaksi($request)
    {
        return 
        [
            'waktu_masuk' => now(),
            'waktu_keluar' => null,
            'status_masuk'
        ];
    }


    // $transaksiData = $this->handleTransaksi($request);

    // $transaksiDetailData = $this->handleTransaksi($request);

}
