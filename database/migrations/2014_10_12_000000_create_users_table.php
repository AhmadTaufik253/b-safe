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
            $table->text('alamat')->nullable();
            $table->string('no_ktp')->unique()->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('tipe_pendaftaran')->nullable();
            $table->enum('status_peserta', ['calon peserta', 'peserta'])->nullable();
            $table->enum('role', ['admin', 'peserta'])->nullable();
            $table->timestamp('tanggal_pendaftaran')->nullable();
            $table->string('password')->nullable();
            // $table->unsignedBigInteger('pelatihan_id')->nullable();
            $table->timestamps();

            
            // Menambahkan foreign key constraint
            // $table->foreign('pelatihan_id')->references('id')->on('pelatihans')->onDelete('set null');
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
