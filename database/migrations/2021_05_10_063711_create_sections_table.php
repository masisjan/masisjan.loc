<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('tab_name')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('images')->nullable();
            $table->string('cord0')->nullable();
            $table->string('cord1')->nullable();
            $table->text('text')->nullable();
            $table->string('publish')->default('not');
            $table->string('count')->default(0);
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
        Schema::dropIfExists('sections');
    }
}
