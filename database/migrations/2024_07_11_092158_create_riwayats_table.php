<?php

use App\Models\Kriteria;
use App\Models\Solusi;
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
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Kriteria::class);
            $table->foreignIdFor(Solusi::class);
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
