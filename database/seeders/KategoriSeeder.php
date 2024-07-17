<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $data = [
            [
                'kategori' => 'Ringan',
                'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt cumque itaque quia dolores. Excepturi reprehenderit aperiam quae officiis doloremque rerum.',
                'range_min' => 0,
                'range_max' => 2,
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kategori' => 'Sedang',
                'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt cumque itaque quia dolores. Excepturi reprehenderit aperiam quae officiis doloremque rerum.',
                'range_min' => 3,
                'range_max' => 5,
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kategori' => 'Tinggi',
                'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt cumque itaque quia dolores. Excepturi reprehenderit aperiam quae officiis doloremque rerum.',
                'range_min' => 6,
                'range_max' => 9,
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
    }
}