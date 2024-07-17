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
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->text('keterangan');
            $table->integer('range_min');
            $table->integer('range_max');
            $table->foreignIdFor(Kriteria::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('kategoris');
    }
};
