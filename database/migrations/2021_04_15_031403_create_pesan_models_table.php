<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pesan', function (Blueprint $table) {
            $table->bigIncrements('pesan_id');
            $table->string('pesan_nama');
            $table->string('pesan_nohp');
            $table->string('pesan_email');
            $table->text('pesan_isi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pesan');
    }
}
