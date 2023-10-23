<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ci', 15)->unique();
            $table->string('name', 30);
            $table->string('lastname', 50);
            $table->date('birth_date');
            $table->string('gender', 1);
            $table->string('photo');
            $table->unsignedBigInteger('number_phone');
            $table->string('marital_status');
            $table->string('current_residence');
            $table->string('type', 1);
            $table->string('email');
            $table->string('password');
            $table->date('registration_date');
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
        Schema::dropIfExists('users');
    }
}
