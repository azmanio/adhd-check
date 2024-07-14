<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $data = [
            [
                'nama' => 'Inattention',
                'kode_kriteria' => 'AD',
                'deskripsi' => 'Anak memenuhi kriterita gangguan pemusatan perhatian (inattention), namun tidak memenuhi kriteria hiperaktif-impulsif (hyperactive/impulsive). Setidaknya 6 (atau lebih) gejala dari kriteria ini telah berlangsung ke tingkat yang mengganggu dan tidak pantas untuk tingkat perkembangan seseorang dalam 6 bulan terakhir.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Hyperactive-Impulsive',
                'kode_kriteria' => 'HD',
                'deskripsi' => 'Anak memenuhi kriteria hiperaktif-impulsif (hyperactive/impulsive) namun tidak memenuhi kriteria gangguan pemusatan perhatian (inattention). Setidaknya 6 (atau lebih) gejala dari kriteria ini telah berlangsung ke tingkat yang mengganggu dan tidak pantas untuk tingkat perkembangan seseorang dalam 6 bulan terakhir.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Combined',
                'kode_kriteria' => 'ADHD',
                'deskripsi' => 'Anak memenuhi kriteria baik gangguan pemusatan perhatian (inattention) dan hiperaktif-impulsif (hyperactive/impulsive) dalam 6 bulan terakhir.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Kriteria::insert($data);
    }
}
