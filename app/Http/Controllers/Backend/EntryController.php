<?php

namespace App\Http\Controllers\Backend;

use App\Events\PengunjungAction;
use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntryController extends BackendController
{
    public function entrySearch(Request $request)
    {
        $typeSearch = $request->type_search;
        $transaksi  = Transaksi::with('detail', 'detail.peserta')->where('kode_transaksi', $request->kode_pengunjung)->first();

        if (!$transaksi) {
            return response()->json(['status' => 'error', 'message' => 'kode tidak terdaftar'], 201);
        }

        if ($typeSearch == 'in' && $transaksi->status == 'in') {

            return response()->json(['status' => 'error', 'message' => 'Pengunjung sudah masuk.']);
        } else if ($typeSearch == 'out' && $transaksi->status == 'out') {

            return response()->json(['status' => 'error', 'message' => 'Pengunjung sudah keluar.']);
        }

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
        $transaksi = Transaksi::where('kode_transaksi', $request->kode_transaksi)->first();
        if (!$transaksi) {
            $this->notif('error', 'Kode Pengunjung tidak terdaftar');
            return redirect()->back();
        }
        DB::beginTransaction();
        try {
            $entry = Entry::create(
                [
                    'transaksi_id' => $transaksi->id,
                    'waktu_masuk'  => now(),
                    'waktu_keluar' => null,
                    'user_id'      => auth()->user()->id,
                ]
            );

            if ($entry) {
                $transaksi->status = 'in';
                $transaksi->save();
            }
            DB::commit();
            $this->callPusher();
            $this->notif('success', 'Berhasil Menyimpan Kode Pengunjung, Pengunjung boleh masuk.');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e->getMessage());
            $this->notif('error', $e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function entryOut()
    {
        $bcrum = $this->bcrum('Cek Keluar Pengunjung');
        return view('backend.entry.out', compact('bcrum'));
    }

    public function entryOutAction(Request $request)
    {
        $transaksi = Transaksi::where('status', 'in')
            ->where('kode_transaksi', $request->kode_transaksi)->first();
        if (!$transaksi) {
            $this->notif('error', 'Kode Pengunjung tidak terdaftar / sudah keluar.');
            return redirect()->back();
        }
        DB::beginTransaction();
        try {

            $entry = Entry::where('transaksi_id', $transaksi->id)
                ->where('waktu_keluar', NULL)
                ->first();
            $dataEntry =  [
                'transaksi_id' => $transaksi->id,
                'waktu_masuk'  => $entry->waktu_masuk,
                'waktu_keluar' => now(),
                'user_id'      => auth()->user()->id,
            ];
            $updateEntry = $entry->update($dataEntry);

            if ($updateEntry) {
                $transaksi->status = 'out';
                $transaksi->save();
            }
            DB::commit();
            $this->callPusher();
            $this->notif('success', 'Berhasil Menyimpan Kode Pengunjung, Pengunjung boleh keluar.');
            return redirect()->back();
        } catch (Exception $e) {
            $this->notif('error', $e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function callPusher()
    {
        $jumlahDaftar = Transaksi::where('status','pendaftaran')->sum('jumlah_peserta');
        $jumlahIn     = Transaksi::where('status','in')->sum('jumlah_peserta');
        $jumlahOut    = Transaksi::where('status','out')->sum('jumlah_peserta');
        return event(new PengunjungAction($jumlahDaftar,$jumlahIn,$jumlahOut));
    }
}
