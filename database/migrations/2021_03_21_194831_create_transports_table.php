<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('tab_name')->default(11);
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->string('number')->nullable();
            $table->string('value')->nullable();
            $table->string('time')->nullable();
            $table->string('map')->nullable();
            $table->string('text')->nullable();
            $table->string('publish')->default('not');
            $table->string('count')->default(0);
            $table->string('rating')->nullable();
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
        Schema::dropIfExists('transports');
    }
}
