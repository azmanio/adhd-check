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
        Schema::create('rel_kriterias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kriteria::class, 'kriteria1');
            $table->foreignIdFor(Kriteria::class, 'kriteria2');
            $table->double('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('rel_kriterias');
    }
};