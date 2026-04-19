<?php

namespace App\Models;

use App\Models\Fasilitas;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['path', 'id_fasilitas', 'id_tempat'];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }

    public function tempat()
    {
        return $this->belongsTo(Tempat::class);
    }
}

