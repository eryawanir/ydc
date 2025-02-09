<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\RekamMedis;
use Carbon\Carbon;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function umur(): Attribute
    {
        $umur = Carbon::parse($this->attributes['tanggal_lahir'])->age;

            return Attribute::make(
                get: fn() => $umur? $umur :"Tidak diketahui");
    }

    /**
     * Get all of the rekamMedis for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rekamMedis(): HasMany
    {
        return $this->hasMany(RekamMedis::class, 'foreign_key', 'local_key');
    }
}
