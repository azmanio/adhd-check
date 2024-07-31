<?php

use App\Models\Kriteria;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak');
            $table->integer('umur_anak');
            $table->string('instansi');
            $table->double('nilai_hasil')->nullable();
            $table->string('kriteria_dominan')->nullable();
            $table->double('nilai_combined')->nullable();
            $table->double('persentase_combined')->nullable();
            $table->string('kategori')->nullable();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Kriteria::class)->nullable();
            $table->foreignIdFor(Kategori::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('riwayats');
    }
};