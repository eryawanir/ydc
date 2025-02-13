<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
    public function rekam_medis()
    {
        return $this->belongsTo(RekamMedis::class);
    }
}
