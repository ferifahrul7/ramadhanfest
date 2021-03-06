<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['kode_transaksi', 'jenis_peserta', 'status', 'jumlah_peserta'];

    public function detail()
    {
        return $this->hasMany(TransaksiDetail::class,'transaksi_id');
    }

    public function entry()
    {
        return $this->hasMany(Entry::class,'transaksi_id');
    }
}
