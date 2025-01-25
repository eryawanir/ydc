<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function namaJenis(): Attribute
    {
        if ($this->attributes['jenis'] == 1) {
            return Attribute::make(
                get: fn() => "Tindakan Umum"
            );
        } elseif ($this->attributes['jenis'] == 2) {
            return Attribute::make(
                get: fn() => "Tindakan Lab"
            );
        }
        } elseif ($this->attributes['jenis'] == 2) {
            return Attribute::make(
                get: fn() => "Tindakan Lab"
            );
        }
    }
    protected function persenanDokter(): Attribute
    {
        if ($this->attributes['jenis'] == 1) {
            return Attribute::make(
                get: fn() => 0.35
            );
        } elseif ($this->attributes['jenis'] == 2) {
            return Attribute::make(
                get: fn() => "Tindakan Lab"
            );
        }
    }
}
