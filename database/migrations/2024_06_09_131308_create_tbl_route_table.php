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
        Schema::create('tbl_route', function (Blueprint $table) {
            $table->id('route_id');
            $table->unsignedBigInteger('term_id_from'); 
            $table->foreign('term_id_from')->references('term_id')->on('tbl_terminal');
            $table->unsignedBigInteger('term_id_to'); 
            $table->foreign('term_id_to')->references('term_id')->on('tbl_terminal');
            $table->unsignedBigInteger('bus_id'); 
            $table->foreign('bus_id')->references('bus_id')->on('tbl_bus');
            $table->string('route_departure_time', 50);
            $table->string('route_departure_date', 50);
            $table->string('route_code', 50);
            $table->integer('route_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_route');
    }
};
