<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = 'transaksi_detail';

    protected $fillable = ['transaksi_id', 'peserta_id'];
    
    public function header()
    {
        return $this->belongsTo(Transaksi::class,'transaksi_id');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class,'peserta_id');
    }
}
