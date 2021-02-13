<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('tab_name')->default(4);
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('director')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->string('fb')->nullable();
            $table->string('cord0')->nullable();
            $table->string('cord1')->nullable();
            $table->string('monday')->nullable()->default('Փակ է');
            $table->string('tuesday')->nullable()->default('Փակ է');
            $table->string('wednesday')->nullable()->default('Փակ է');
            $table->string('thursday')->nullable()->default('Փակ է');
            $table->string('friday')->nullable()->default('Փակ է');
            $table->string('saturday')->nullable()->default('Փակ է');
            $table->string('sunday')->nullable()->default('Փակ է');
            $table->text('text')->nullable();
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
        Schema::dropIfExists('banks');
    }
}
