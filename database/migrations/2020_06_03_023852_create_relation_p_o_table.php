<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationPOTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations_p_o', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('policy_id');
            $table->bigInteger('office_id');
            $table->timestamps();

            $table->foreign('policy_id')->references('id')->on('policies');
            $table->foreign('office_id')->references('id')->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationship_p_os');
    }
}
