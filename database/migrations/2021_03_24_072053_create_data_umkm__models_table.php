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
            $table->string('pemilik');
            $table->text('pemilik_tgl_lahir');
            $table->string('pemilik_nohp');
            $table->text('pemilik_alamat');
            $table->string('pemilik_ktp');
            $table->string('umkm_nama');
            $table->string('umkm_email');
            $table->string('umkm_password');
            $table->integer('jenis_id');
            $table->string('umkm_nohp');
            $table->string('umkm_foto');
            $table->string('umkm_lama_usaha');
            $table->string('prov_id');
            $table->string('kota_id');
            $table->text('umkm_alamat');
            $table->string('umkm_status');
            $table->string('umkm_slug');
            $table->string('umkm_instagram')->nullable();
            $table->string('umkm_facebook')->nullable();
            $table->integer('umkm_viewer')->default(0);
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
