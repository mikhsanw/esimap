<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_jabatans', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->integer('tahun')->nullable();
			$table->foreignUuid('jabatan_id')->nullable()->constrained();
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
        Schema::dropIfExists('riwayat_jabatans');
    }
}
