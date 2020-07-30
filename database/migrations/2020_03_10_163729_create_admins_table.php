<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;


class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('ci')->unique();
            $table->string('phone_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });

        // DB::statement("UPDATE admins set id = id + 1000;");
        // DB::statement("ALTER TABLE admins AUTO_INCREMENT = 14000;");

        DB::table('admins')->insert(['id' => 10000, 'name' => 'admin', 'email' => 'whatever', 'ci' => '12345678', 'phone_number' => '12345678', 'password' => Hash::make('12345678')]);
        // DB::table('admins')->where('id', 13999)->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
