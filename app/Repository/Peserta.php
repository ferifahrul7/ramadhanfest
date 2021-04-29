<?php

namespace app\Repository;
use App\Models\Peserta as Model;

class Peserta
{
    public function getPeserta($request)
    {
        return Model::with('transaksi_detail','transaksi_detail.header')->get();
    }
}