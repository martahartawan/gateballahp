<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_kriterias', function (Blueprint $table) {
            $table->id();
            $table->json('matriks');
            $table->Integer('kriteria_id1'); // Menambahkan unsigned()
            $table->Integer('kriteria_id2'); // Menambahkan unsigned()
            $table->float('nilai'); // Mengubah tipe data menjadi string
            $table->timestamps();
    
            // // Menambahkan foreign key constraint
            // $table->foreign('kriteria_id1')->references('id')->on('kriteria');
            // $table->foreign('kriteria_id2')->references('id')->on('kriteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perbandingan_kriterias');
    }
};
