<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}