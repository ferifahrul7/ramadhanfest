<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['kode_transaksi', 'jenis_peserta', 'status', 'jumlah_peserta'];

}
