<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('value')->nullable();
            $table->string('t_name')->nullable();
            $table->string('number')->nullable();
            $table->unsignedBigInteger('t_id')->nullable();
            $table->unsignedBigInteger('workdays_id')->nullable();
            $table->unsignedBigInteger('holidays_id')->nullable();
            $table->timestamps();
            $table->foreign('t_id')->references('id')->on('transports')->onDelete('cascade');
            $table->foreign('workdays_id')->references('id')->on('times')->onDelete('cascade');
            $table->foreign('holidays_id')->references('id')->on('times')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stops');
    }
}
