<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('office');
            $table->bigInteger('user_id');
            $table->bigInteger('cpvca');
            $table->bigInteger('cpvm');
            $table->decimal('totalca', 25, 2);
            $table->decimal('totalm', 25, 2);
            $table->decimal('total', 25, 2);
            $table->decimal('profit_percentage', 7, 2);
            $table->decimal('total_payment', 25, 2);
            $table->date('from');
            $table->date('until');
            $table->string('bill')->default('Sin comprobante');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
