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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('no_booking')->nullable()->unique();
            $table->unsignedBigInteger('id_user')->nullable()->index();
            $table->unsignedBigInteger('id_paket')->nullable()->index();
            $table->integer('status')->nullable()->default(0);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('id_paket')->references('id')->on('paket')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
};
