<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBerkasPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_pegawais', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->foreignUuid('berkas_id')->nullable()->constrained();
			$table->string('tahun',4)->nullable();
			$table->text('keterangan')->nullable();
			$table->foreignUuid('pegawai_id')->nullable()->constrained();
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
        Schema::dropIfExists('berkas_pegawais');
    }
}
