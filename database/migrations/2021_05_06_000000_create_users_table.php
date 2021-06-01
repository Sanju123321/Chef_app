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
            $table->increments('id');
            $table->string('full_name');
            $table->string('business_name')->nullable();
            $table->string('country_code')->nullable();
            $table->BigInteger('phone_number')->nullable();
            $table->Integer('alternative_country_code')->nullable();
            $table->BigInteger('alternative_phone_number')->nullable();
            $table->string('email')->unique();
            $table->String('password');
            $table->string('gender')->nullable();
            $table->string('secret_key')->nullable();
            $table->date('dob')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('street_name')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('building_description')->nullable();
            $table->string('status')->nullable();            
            $table->Datetime('deleted_at')->nullable();
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
