<?php

namespace app\Repository;
use App\Models\Peserta as Model;

class Peserta
{
    public function getPeserta($request)
    {
        return Model::all();
    }
}