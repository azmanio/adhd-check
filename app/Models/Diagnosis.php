<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'diagnosis';

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function riwayat()
    {
        return $this->belongsTo(Riwayat::class);
    }


}
