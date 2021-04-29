<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';

    protected $fillable = ['nama_peserta', 'nik', 'alamat', 'hp', 'parent_id'];

    public function transaksi_detail()
    {
        return $this->hasOne(TransaksiDetail::class,'peserta_id');
    }
}
