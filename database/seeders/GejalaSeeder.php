<?php

namespace Database\Seeders;

use App\Models\Gejala;
use App\Models\Kriteria;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $data = [
            [
                'kode_gejala' => 'G1',
                'gejala' => 'Anak saya sering gagal memperhatikan detail atau sering membuat kecerobohan di kegiatan sekolah atau aktivitas lain',
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G2',
                'gejala' => 'Anak saya sering kesulitan memusatkan perhatian pada belajar atau aktivitas bermain',
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G3',
                'gejala' => 'Anak saya sering terlihat tidak mendengarkan ketika diajak bicara',
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G4',
                'gejala' => 'Anak saya sering tidak mengikuti instruksi dan gagal menyelesaikan tugas sekolah atau kegiatan lainnya',
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G5',
                'gejala' => 'Anak saya sering kesulitan mengorganisir tugas atau menyelesaikan satu aktivitas tertentu',
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G6',
                'gejala' => 'Anak saya sering menghindari, tidak menyukai, atau malas melakukan pekerjaan yang membutuhkan usaha berpikir, misalnya menyusun puzzle atau menggambar dengan detail',
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G7',
                'gejala' => 'Anak saya sering kehilangan benda-benda yang penting untuk tugas atau aktivitas, seperti mainan, alat tulis, atau buku',
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G8',
                'gejala' => 'Anak saya sering mudah terganggu oleh hal-hal di sekitarnya, seperti suara, cahaya, atau gerakan',
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G9',
                'gejala' => 'Anak saya sering lupa melakukan kegiatan sehari-hari, seperti membereskan mainan, menggosok gigi, atau menyimpan barang di tempatnya',
                'kriteria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G10',
                'gejala' => 'Anak saya sering tidak bisa diam saat duduk, sering menggeliat atau menggerakkan kaki dan tangan, seperti mengetuk-nngetukkan jari atau terus bergerak saat bermain atau melakukan kegiatan lainnya',
                'kriteria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G11',
                'gejala' => 'Anak saya sering meninggalkan tempat duduk pada kondisi dimana anak diharapkan tetap duduk diam, misalnya saat belajar di sekolah',
                'kriteria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G12',
                'gejala' => 'Anak saya sering berlari-lari atau memanjat di saat dan tempat yang tidak seharusnya, seperti di dalam rumah atau di tempat umum, meskipun situasinya tidak tepat',
                'kriteria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G13',
                'gejala' => 'Anak saya sering kesulitan untuk bermain untuk melakukan aktivitas yang membutuhkan ketenangan, seperti mendengarkan cerita atau bermain puzzle dengan tenang',
                'kriteria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G14',
                'gejala' => 'Anak saya sering terlihat seperti dikendalikan oleh mesin atau seperti tidak mudah merasa lelah',
                'kriteria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G15',
                'gejala' => 'Anak saya sering berbicara secara berlebihan',
                'kriteria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G16',
                'gejala' => 'Anak saya sering menjawab sebelum pertanyaan selesai diajukan',
                'kriteria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G17',
                'gejala' => 'Anak saya sering merasa sulit untuk menunggu giliran, misalnya saat bermain game atau saat mengantri untuk melakukan aktivitas di kelas atau di luar ruangan',
                'kriteria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_gejala' => 'G18',
                'gejala' => 'Anak saya sering menyela atau mengganggu percakapan dan aktivitas orang lain',
                'kriteria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Gejala::insert($data);
    }
}