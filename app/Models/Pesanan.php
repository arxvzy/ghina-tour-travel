<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';

    protected $fillable = [
        'id_paket',
        'nama_pemesan',
        'no_hp',
        'diskon',
        'jumlah_orang',
        'total_harga',
        'tanggal_acara',
        'invoice',
        'status',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}
