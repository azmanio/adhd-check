<?php

use App\Models\Gejala;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('rel_gejalas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Gejala::class, 'gejala1');
            $table->foreignIdFor(Gejala::class, 'gejala2');
            $table->double('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('rel_gejalas');
    }
};