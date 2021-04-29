<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entry';

    protected $fillable = ['waktu_masuk','waktu_keluar','user_id','transaksi_id'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class,'transaksi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
