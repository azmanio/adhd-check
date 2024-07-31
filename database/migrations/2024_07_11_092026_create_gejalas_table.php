<?php

use App\Models\Kriteria;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('gejalas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala');
            $table->string('gejala');
            $table->double('bobot_prioritas')->nullable();
            $table->double('nilai_pakar')->nullable();
            $table->foreignIdFor(Kriteria::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('gejalas');
    }
};