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
        Schema::create('tbl_bus', function (Blueprint $table) {
            $table->id('bus_id');
            $table->string('bus_code', 10);
            $table->string('bus_type', 50);
            $table->integer('bus_seats');
            $table->integer('bus_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_bus');
    }
};
