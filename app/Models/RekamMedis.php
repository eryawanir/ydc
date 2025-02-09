<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;

class RekamMedis extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'rekam_medis';

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
    public function tindakans()
    {
        return $this->hasMany(Tindakan::class);
    }
}
