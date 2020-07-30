<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('price_id');
            $table->bigInteger('vehicle_id');
            $table->string('client_email');
            $table->string('client_name');
            $table->string('client_lastname');
            $table->string('client_ci');
            $table->string('client_phone')->nullable();
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->string('vehicle_registration');
            $table->string('vehicle_bodywork_serial')->nullable();
            $table->string('vehicle_weight')->nullable();
            $table->string('vehicle_motor_serial')->nullable();
            $table->string('vehicle_certificate_number')->nullable();
            $table->string('type')->nullable();
            $table->string('used_for');
            $table->string('vehicle_color');
            $table->bigInteger('vehicle_year');
            $table->boolean('vehicle_type');
            $table->boolean('status')->default(0);
            $table->date('expiring_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('price_id')->references('id')->on('prices');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policies');
    }
}
