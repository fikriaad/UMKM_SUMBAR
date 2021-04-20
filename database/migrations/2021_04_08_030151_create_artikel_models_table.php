<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_artikel', function (Blueprint $table) {
            $table->bigIncrements('artikel_id');
            $table->string('artikel_judul');
            $table->date('artikel_tanggal');
            $table->string('artikel_penulis');
            $table->text('artikel_isi');
            $table->string('artikel_gambar');
            $table->string('artikel_slug')->nullable();
            $table->integer('artikel_viewer')->default(0);
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
        Schema::dropIfExists('tb_artikel');
    }
}
