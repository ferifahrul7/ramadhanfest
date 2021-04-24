<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranRequest;
use App\Models\Peserta;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('frontend.pendaftaran');
    }

    public function store(PendaftaranRequest $request)
    {
        $data = $this->handleRequest($request);
        DB::beginTransaction();
        try {
            $peserta = Peserta::create($data['parent']);

            $transaksiData = $this->handleTransaksi($request);
            $transaksi = Transaksi::create($transaksiData);

            if ($request->jenis_pengunjung == 'grup') {
                $pesertaChild = Peserta::insert($data['child']);
            }

            $transaksiDetailData = $this->handleTransaksiDetail($transaksi, $peserta);
            $transaksiDetail = TransaksiDetail::insert($transaksiDetailData);

            DB::commit();
            return response()->json(['status' => 'success', 'kode' => $transaksi->kode_transaksi]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'kode' => null, 'message' => $e->getMessage()], 201);
        }
        // return response()->json(['status' => 'success', 'kode' => '123']);
    }

    public function handleTransaksi($request)
    {
        $grup = $request->grup;
        return
            [
                'kode_transaksi' => $this->generateKode(),
                'status' => 'pendaftaran',
                'jenis_peserta' => $request->jenis_pengunjung,
                'jumlah_peserta' => ($request->jenis_pengunjung == 'personal') ? 1 : $grup + 1,
            ];
    }

    public function generateKode()
    {
        $kode =  rand(10000, 99999);
        $check = Transaksi::where('kode_transaksi', $kode)->first();
        if ($check) {
            return $this->generateKode();
        }
        return $this->attributes['kode_transaksi'] = $kode;
    }

    public function handleTransaksiDetail($header, $pesertaParent)
    {
        $pesertaChild = Peserta::where('parent_id', $pesertaParent->nik)->get();

        $detail[] = [
            'transaksi_id' => $header->id,
            'peserta_id' => $pesertaParent->id,
            'created_at' => now(),
            'updated_at' => now()
        ];

        if (count($pesertaChild) > 0) {
            foreach ($pesertaChild as $peserta)
                $detail[] = [
                    'transaksi_id' => $header->id,
                    'peserta_id' => $peserta->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
        }

        return $detail;
    }

    public function handleRequest($request)
    {
        $data['parent'] = $request->only('nama_peserta', 'nik', 'alamat', 'hp');
        if ($request->jenis_pengunjung == 'grup') {
            foreach ($request->grup as $grup) {
                $data['child'][] = $grup + ['created_at' => now(), 'updated_at' => now(), 'parent_id' => $request->nik];
            }
        }
        return $data;
    }
}
