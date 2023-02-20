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
            $table->string('name');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('address');
            $table->string('primary_address');
            $table->string('secondary');
            $table->string('state');
            $table->text('zip');
            $table->string('county');
            $table->text('age_range');
            $table->text('income_range');
            $table->text('home_value_range');
            $table->string('owns_a_home');
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
