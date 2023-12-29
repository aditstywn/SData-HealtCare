<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    protected $with = ['rekamMedis'];


    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
