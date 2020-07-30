<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('damage_things', 25, 2)->default('0');
            $table->decimal('premium1', 25, 2)->default('0');
            $table->decimal('damage_people', 25, 2)->default('0');
            $table->decimal('premium2', 25, 2)->default('0');
            $table->decimal('disability', 25, 2)->default('0');
            $table->decimal('premium3', 25, 2)->default('0');
            $table->decimal('legal_assistance', 25, 2)->default('0');
            $table->decimal('premium4', 25, 2)->default('0');
            $table->decimal('death', 25, 2)->default('0');
            $table->decimal('premium5', 25, 2)->default('0');
            $table->decimal('medical_expenses', 25, 2)->default('0');
            $table->decimal('premium6', 25, 2)->default('0');
            $table->decimal('crane', 25, 2)->default('0');
            $table->decimal('total_premium', 30, 2)->default('0');
            $table->decimal('total_all', 30, 2)->default('0');
            $table->string('description');
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
        Schema::dropIfExists('prices');
    }
}
