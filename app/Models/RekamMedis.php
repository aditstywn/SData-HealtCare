<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    protected $with = ['pasien'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
