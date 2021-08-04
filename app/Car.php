<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'id', 'number', 'user_id', 'layanan', 'nama_pemilik', 'no_polisi', 'no_rangka', 'no_mesin', 'nama_stnk', 'dp', 'tanggal_terima', 'estimasi', 'keterangan', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
