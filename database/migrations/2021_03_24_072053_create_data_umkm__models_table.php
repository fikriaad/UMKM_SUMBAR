<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUmkmModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_data_umkm', function (Blueprint $table) {
            $table->bigIncrements('umkm_id');
            $table->string('umkm_nama');
            $table->integer('jenis_id');
            $table->string('umkm_lama_usaha');
            $table->string('umkm_nohp');
            $table->string('prov_id');
            $table->string('kota_id');
            $table->text('umkm_alamat');
            $table->string('umkm_email');
            $table->string('umkm_instagram');
            $table->string('umkm_facebook');
            $table->string('umkm_foto');
            $table->string('umkm_status');
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
        Schema::dropIfExists('tb_data_umkm');
    }
}
