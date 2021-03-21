<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('tab_name')->nullable();
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
            $table->string('confirm')->default('not');
            $table->string('count')->default(0);
            $table->string('rating')->nullable();
            $table->string('qr_cod')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('services');
    }
}
