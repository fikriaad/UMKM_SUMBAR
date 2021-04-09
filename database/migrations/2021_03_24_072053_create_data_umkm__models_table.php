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
            $table->text('pemilik_tgl_lahir')->nullable();
            $table->string('pemilik_nohp')->nullable();
            $table->text('pemilik_alamat')->nullable();
            $table->string('pemilik_ktp')->nullable();
            $table->string('umkm_nama');
            $table->string('umkm_email');
            $table->string('umkm_password');
            $table->integer('kategori_id');
            $table->string('umkm_nohp');
            $table->string('umkm_foto')->nullable();
            $table->string('umkm_lama_usaha')->nullable();
            $table->string('prov_id')->nullable();
            $table->string('kota_id')->nullable();
            $table->text('umkm_alamat');
            $table->string('umkm_status')->default(0);
            $table->string('umkm_slug')->nullable();
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
