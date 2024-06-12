<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_booking', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedBigInteger('route_id'); 
            $table->foreign('route_id')->references('route_id')->on('tbl_route');
            $table->string('booking_firstname', 100);
            $table->string('booking_surname', 100);
            $table->string('booking_email', 100);
            $table->string('booking_contact', 100);
            $table->integer('booking_seats');
            $table->string('booking_code', 50);
            $table->integer('booking_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_booking');
    }
};
