<?php

use App\Models\Gejala;
use App\Models\Kategori;
use App\Models\Kriteria;
use App\Models\Riwayat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Riwayat::class)->nullable();
            $table->foreignIdFor(Kriteria::class)->nullable();
            $table->foreignIdFor(Gejala::class)->nullable();
            $table->foreignIdFor(Kategori::class)->nullable();
            $table->double('nilai_user')->nullable();
            $table->double('nilai_hasil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('diagnosis');
    }
};