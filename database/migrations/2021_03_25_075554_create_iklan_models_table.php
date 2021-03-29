<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIklanModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_iklan', function (Blueprint $table) {
            $table->bigIncrements('iklan_id');
            $table->string('iklan_judul');
            $table->string('iklan_gambar');
            $table->string('iklan_keterangan');
            $table->text('iklan_letak')->nullable();
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
        Schema::dropIfExists('tb_iklan');
    }
}
