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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_member');
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->integer('diskon');
            $table->integer('bayar');  
            $table->integer('diterima');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_member')->references('id')->on('members');
            $table->foreign('id_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
};
