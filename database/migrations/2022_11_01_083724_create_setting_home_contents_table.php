<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_home_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('setting_id')->unsigned();
            $table->enum('type', ['home', 'services'])->default('home');
            $table->string('title', 100);
            $table->string('content', 1000);
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
        Schema::dropIfExists('setting_home_contents');
    }
};
