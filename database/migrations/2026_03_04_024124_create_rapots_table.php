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
        Schema::create('rapots', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('nama_siswa');
            $table->string('nis');
            $table->string('kelas');
            $table->string('semester');

            $table->integer('matematika');
            $table->integer('b_indonesia');
            $table->integer('b_inggris');
            $table->integer('produktif');

            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapots');
    }
};
