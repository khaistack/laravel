<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('City')->nullable();
            $table->string('Zip')->nullable();
            $table->string('State')->nullable();
            $table->string('Address')->nullable();
            $table->string('About Me')->nullable();
            $table->string('Skills')->nullable();
            $table->string('Language')->nullable();
            $table->string('Age')->nullable();
            $table->string('Availability')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
