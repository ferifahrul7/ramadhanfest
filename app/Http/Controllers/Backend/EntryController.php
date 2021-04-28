<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class EntryController extends BackendController
{
    public function entrySearch(Request $request)
    {
        $transaksi = Transaksi::with('detail','detail.peserta')->where('kode_transaksi', $request->kode_pengunjung)->first();

        if (!$transaksi) {
            return response()->json(['status' => 'error', 'message' => 'kode tidak terdaftar'], 201);
        }
        //cek jika sudah masuk
        if ($transaksi->status == 'in') {
            return response()->json(['status' => 'error', 'message' => 'Pengunjung sudah masuk']);
        }

        // $detailTrans = TransaksiDetail::with('peserta')
        //     ->where('transaksi_id', $transaksi->id)
        //     ->get();

        $result = [
            'status'            => 'success',
            'kode_transaksi'    => $transaksi->kode_transaksi,
            'message'           => 'Berhasil mendapatkan data',
            'peserta'           => $transaksi->detail,
            'jenis_pengunjung'  => $transaksi->jenis_peserta,
            'jumlah_peserta'    => $transaksi->jumlah_peserta,
        ];

        return response()->json($result, 200);

    }
    public function entryIn()
    {
        $bcrum = $this->bcrum('Cek Masuk Pengunjung');
        return view('backend.entry.in', compact('bcrum'));
    }

    public function entryInAction(Request $request)
    {
        // todo entry in
    }

    public function entryOut()
    {
        return view('backend.entry.out');
    }

    public function entryOutAction(Request $request)
    {
        // todo action entry out
    }
}
