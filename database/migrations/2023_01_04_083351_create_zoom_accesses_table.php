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
        Schema::create('zoom_accesses', function (Blueprint $table) {
            $table->id();
            $table->string('user_info', 1000)->nullable()->default("{}");
            $table->string('refresh_token', 1000);
            $table->dateTime('refresh_token_expiry');
            $table->string('access_token', 1000);
            $table->dateTime('access_token_expiry');
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
        Schema::dropIfExists('zoom_accesses');
    }
};
