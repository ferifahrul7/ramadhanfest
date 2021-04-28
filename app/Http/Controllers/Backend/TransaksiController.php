<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TransaksiController extends BackendController
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

    public function getByCode(Request $request)
    {
        $data = TransaksiDetail::with('peserta')->whereHas('header',function($query) use ($request){
            return $query->where('kode_transaksi',$request->kode);
        })->get();

        return DataTables::of($data)
                ->setRowId('idx')
                ->addIndexColumn()
                ->make(true);
    }


    // $transaksiData = $this->handleTransaksi($request);

    // $transaksiDetailData = $this->handleTransaksi($request);

}