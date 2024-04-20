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
        Schema::create('stripe_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('email', 100);
            $table->string('contact', 100);
            $table->string('country', 100);
            $table->bigInteger('slot_id')->unsigned();
            $table->boolean('is_consultation')->default(true);
            $table->bigInteger('service_id')->unsigned()->nullable();
            $table->date('date');
            $table->time('slot');
            $table->integer('price')->unsigned();
            $table->tinyInteger('booking_status_id')->unsigned();
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('booking_status_id')->references('id')->on('booking_statuses')->onDelete('cascade');
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
        Schema::dropIfExists('stripe_bookings');
    }
};
