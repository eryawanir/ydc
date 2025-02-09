<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function nama(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => 'drg. ' . $value
        );
    }
}
