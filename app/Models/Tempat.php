<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
    protected $fillable = [
        'id_paket',
        'nama_tempat'
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'id_tempat');
    }
}
