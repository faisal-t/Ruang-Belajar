<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_id')->nullable()->constrained();
            $table->foreignId('sub_materi_id')->nullable()->constrained();
            $table->text('judul_soal');
            $table->text('jawaban_a');
            $table->text('jawaban_b');
            $table->text('jawaban_c');
            $table->text('jawaban_d');
            $table->text('jawaban_e')->nullable();
            $table->string('kunci_jawaban');
            $table->text('gambar')->nullable();
            $table->time('waktu_pengerjaan');
            $table->enum('ujian_aktif',['Y','N']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soals');
    }
}
