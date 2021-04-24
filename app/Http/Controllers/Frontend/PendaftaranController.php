<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranRequest;
use App\Models\Peserta;
use App\Models\Transaksi;
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
            // $transaksiData = [
            //     'jenis_peserta'
            // ] 
            if ($request->jenis_pengunjung == 'grup') {
                $peserta = Peserta::insert($data['child']);
            }
            DB::commit();
            return response()->json(['status' => 'success', 'kode' => '123']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'kode' => null, 'message' => $e->getMessage()], 201);
        }
        // return response()->json(['status' => 'success', 'kode' => '123']);
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
