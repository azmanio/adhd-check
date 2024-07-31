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
                'solusi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel numquam neque praesentium deserunt accusantium fugit ex quasi dignissimos laborum odit.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Hyperactive',
                'kode_kriteria' => 'HD',
                'deskripsi' => 'Anak memenuhi kriteria hiperaktif-impulsif (hyperactive/impulsive) namun tidak memenuhi kriteria gangguan pemusatan perhatian (inattention). Setidaknya 6 (atau lebih) gejala dari kriteria ini telah berlangsung ke tingkat yang mengganggu dan tidak pantas untuk tingkat perkembangan seseorang dalam 6 bulan terakhir.',
                'solusi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel numquam neque praesentium deserunt accusantium fugit ex quasi dignissimos laborum odit.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Impulsive',
                'kode_kriteria' => 'IM',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel numquam neque praesentium deserunt accusantium fugit ex quasi dignissimos laborum odit.',
                'solusi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel numquam neque praesentium deserunt accusantium fugit ex quasi dignissimos laborum odit.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Kriteria::insert($data);
    }
}