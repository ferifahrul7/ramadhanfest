<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AktivitasController extends BackendController
{
    public function index()
    {
        $bcrum = $this->bcrum('Aktifitas Keluar Masuk Pengunjung');
        return view('backend.aktivitas.index', compact('bcrum'));
    }

    public function indexAjax(Request $request)
    {
        if ($request->ajax()) {
            $data = Entry::with('transaksi','user', 'transaksi.detail', 'transaksi.detail.peserta');
            return DataTables::of($data)
                ->setRowId('idx')
                ->editColumn('peserta.nama_peserta', function ($data) {
                    $peserta = '';
                    foreach ($data->transaksi->detail as $detail) {
                        $peserta .=  $detail->peserta->nama_peserta . ', ';
                    }
                    return substr($peserta, 0, -2);
                })
                ->addIndexColumn()
                ->rawColumns(['peserta.nama_peserta'])
                ->make(true);
        }
    }
}
