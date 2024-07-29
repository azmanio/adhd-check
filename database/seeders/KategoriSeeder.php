<?php

namespace Database\Seeders;

use App\Models\Kategori;
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
                'range_max' => 5.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kategori' => 'Sedang',
                'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt cumque itaque quia dolores. Excepturi reprehenderit aperiam quae officiis doloremque rerum.',
                'range_min' => 6.0,
                'range_max' => 11.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kategori' => 'Tinggi',
                'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt cumque itaque quia dolores. Excepturi reprehenderit aperiam quae officiis doloremque rerum.',
                'range_min' => 12.0,
                'range_max' => 18.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Kategori::insert($data);
    }
}