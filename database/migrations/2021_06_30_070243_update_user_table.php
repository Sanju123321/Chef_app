<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->String('full_name')->nullable();
            $table->Integer('country_code')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('full_name')->nullable();
            $table->dropColumn('country_code')->nullable();
            $table->dropColumn('address')->nullable();
            $table->dropColumn('city')->nullable();
            $table->dropColumn('state')->nullable();
            $table->dropColumn('country')->nullable();
        });
    }
}
