<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelKriteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kriteria1()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria1');
    }

    public function kriteria2()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria2');
    }
}