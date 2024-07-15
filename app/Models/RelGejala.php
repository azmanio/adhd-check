<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelGejala extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gejala1()
    {
        return $this->belongsTo(Gejala::class, 'gejala1');
    }

    public function gejala2()
    {
        return $this->belongsTo(Gejala::class, 'gejala2');
    }
}