<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entry';

    protected $fillable = ['waktu_masuk','waktu_keluar','user_id','transaksi_id'];
}
