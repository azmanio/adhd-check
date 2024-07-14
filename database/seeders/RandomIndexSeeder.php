<?php

namespace Database\Seeders;

use App\Models\RandomIndex;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RandomIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $data = [
            ['jumlah_matriks' => 1, 'nilai' => 0.00],
            ['jumlah_matriks' => 2, 'nilai' => 0.00],
            ['jumlah_matriks' => 3, 'nilai' => 0.58],
            ['jumlah_matriks' => 4, 'nilai' => 0.90],
            ['jumlah_matriks' => 5, 'nilai' => 1.12],
            ['jumlah_matriks' => 6, 'nilai' => 1.24],
            ['jumlah_matriks' => 7, 'nilai' => 1.32],
            ['jumlah_matriks' => 8, 'nilai' => 1.41],
            ['jumlah_matriks' => 9, 'nilai' => 1.45],
            ['jumlah_matriks' => 10, 'nilai' => 1.49],
            ['jumlah_matriks' => 11, 'nilai' => 1.51],
            ['jumlah_matriks' => 12, 'nilai' => 1.48],
            ['jumlah_matriks' => 13, 'nilai' => 1.56],
            ['jumlah_matriks' => 14, 'nilai' => 1.57],
            ['jumlah_matriks' => 15, 'nilai' => 1.59],
        ];

        RandomIndex::insert($data);
    }
}