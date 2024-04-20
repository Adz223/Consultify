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
        Schema::table('slots', function (Blueprint $table) {
            $table->bigInteger('consultant_id')->unsigned();
            $table->foreign('consultant_id')->references('id')->on('consultants')->onDelete('cascade');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->bigInteger('consultant_id')->unsigned();
            $table->foreign('consultant_id')->references('id')->on('consultants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slots', function (Blueprint $table) {
            $table->dropForeign('slots_consultant_id_foreign');
            $table->dropColumn('consultant_id');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('bookings_consultant_id_foreign');
            $table->dropColumn('consultant_id');
        });
    }
};
