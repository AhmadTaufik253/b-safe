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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telepon')->unique();
            $table->string('email')->unique();
            $table->text('alamat');
            $table->string('no_ktp')->unique();
            $table->string('jenis_kelamin');
            $table->string('golongan_darah');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('pendidikan_terakhir');
            $table->string('tipe_pendaftaran');
            $table->enum('role', ['admin', 'peserta']);
            $table->timestamp('tanggal_pendaftaran')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
