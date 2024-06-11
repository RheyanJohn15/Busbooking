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
        Schema::create('tbl_feedback', function (Blueprint $table) {
            $table->id('fb_id');
            $table->string('fb_fname', 50);
            $table->string('fb_surname', 50);
            $table->string('fb_email', 50);
            $table->string('fb_message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_feedback');
    }
};
