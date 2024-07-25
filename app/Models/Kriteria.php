<?php

namespace App\Models;

use App\Models\Gejala;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gejalas()
    {
        return $this->hasMany(Gejala::class, 'kriteria_id');
    }

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class);
    }
}
