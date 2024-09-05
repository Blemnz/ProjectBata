<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('set_webs', function (Blueprint $table) {
            $table->id();
            $table->string('judul1');
            $table->string('judul2');
            $table->string('judul3');
            $table->string('judul4');
            $table->string('judul5');
            $table->string('judul6');
            $table->text('map');
            $table->string('kontakEmail');
            $table->string('kontakNomor');
            $table->string('kontakAlamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_webs');
    }
};

