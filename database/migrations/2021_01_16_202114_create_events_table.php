<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('tab_name')->default(2);
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->text('short_text')->nullable();           $table->string('organizer')->nullable();
            $table->string('date_start')->nullable();
            $table->string('date_end')->nullable();
            $table->string('value')->nullable();
            $table->string('cord0')->nullable();
            $table->string('cord1')->nullable();
            $table->string('publish')->default('not');
            $table->unsignedBigInteger('user_id');
            $table->string('count')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
