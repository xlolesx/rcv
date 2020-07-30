<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_estado');
            $table->bigInteger('id_municipio');
            $table->bigInteger('id_parroquia');
            $table->string('office_address');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_estado')->references('id_estado')->on('estados');
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');
            $table->foreign('id_parroquia')->references('id_parroquia')->on('parroquias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
