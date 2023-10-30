<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acara', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_booking')->nullable()->index();
            $table->date('tanggal_acara')->nullable();
            $table->string('nama_pengantin_pria')->nullable();
            $table->string('tempat_lahir_pengantin_pria')->nullable();
            $table->date('tanggal_lahir_pengantin_pria')->nullable();
            $table->string('pengantin_pria_anak_ke')->nullable();
            $table->string('nama_ayah_pengantin_pria')->nullable();
            $table->string('nama_ibu_pengantin_pria')->nullable();
            $table->string('nama_saudara_pengantin_pria_1')->nullable();
            $table->string('nama_saudara_pengantin_pria_2')->nullable();
            $table->string('alamat_pengantin_pria')->nullable();
            $table->string('telepon_pengantin_pria')->nullable();
            $table->string('email_pengantin_pria')->nullable();
            $table->string('pekerjaan_pengantin_pria')->nullable();
            $table->string('instagram_pengantin_pria')->nullable();
            $table->string('nama_pengantin_wanita')->nullable();
            $table->string('tempat_lahir_pengantin_wanita')->nullable();
            $table->date('tanggal_lahir_pengantin_wanita')->nullable();
            $table->string('pengantin_wanita_anak_ke')->nullable();
            $table->string('nama_ayah_pengantin_wanita')->nullable();
            $table->string('nama_ibu_pengantin_wanita')->nullable();
            $table->string('nama_saudara_pengantin_wanita_1')->nullable();
            $table->string('nama_saudara_pengantin_wanita_2')->nullable();
            $table->string('alamat_pengantin_wanita')->nullable();
            $table->string('telepon_pengantin_wanita')->nullable();
            $table->string('email_pengantin_wanita')->nullable();
            $table->string('pekerjaan_pengantin_wanita')->nullable();
            $table->string('instagram_pengantin_wanita')->nullable();
            $table->timestamps();

            $table->foreign('id_booking')->references('id')->on('booking')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acara');
    }
};
