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
        Schema::create('setting_social_links', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('setting_id')->unsigned();
            $table->string('icon', 255);
            $table->string('name', 100)->unique();
            $table->string('link', 500)->unique();
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
        Schema::dropIfExists('setting_social_links');
    }
};
