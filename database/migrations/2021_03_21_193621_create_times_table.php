<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('day')->nullable();
            $table->string('name')->nullable();
            $table->string('id_t')->nullable();
            $table->string('t01')->nullable();
            $table->string('t02')->nullable();
            $table->string('t03')->nullable();
            $table->string('t04')->nullable();
            $table->string('t05')->nullable();
            $table->string('t06')->nullable();
            $table->string('t07')->nullable();
            $table->string('t08')->nullable();
            $table->string('t09')->nullable();
            $table->string('t10')->nullable();
            $table->string('t11')->nullable();
            $table->string('t12')->nullable();
            $table->string('t13')->nullable();
            $table->string('t14')->nullable();
            $table->string('t15')->nullable();
            $table->string('t16')->nullable();
            $table->string('t17')->nullable();
            $table->string('t18')->nullable();
            $table->string('t19')->nullable();
            $table->string('t20')->nullable();
            $table->string('t21')->nullable();
            $table->string('t22')->nullable();
            $table->string('t23')->nullable();
            $table->string('t24')->nullable();
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
        Schema::dropIfExists('times');
    }
}
