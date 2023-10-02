<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->string('nama')->nullable();
			$table->integer('nip')->nullable();
			$table->integer('nik')->nullable();
			$table->string('tempat_lahir')->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->string('jenis_kelamin')->nullable();
			$table->string('agama')->nullable();
			$table->integer('rt')->nullable();
			$table->integer('rw')->nullable();
			$table->string('desa')->nullable();
			$table->string('kelurahan')->nullable();
			$table->string('kecamatan')->nullable();
			$table->string('kabupaten')->nullable();
			$table->string('provinsi')->nullable();
			$table->foreignUuid('bidang_id')->nullable()->constrained();
			$table->foreignUuid('jabatan_id')->nullable()->constrained();
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
        Schema::dropIfExists('pegawais');
    }
}
