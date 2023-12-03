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
        Schema::create('skedules', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('starting');
            $table->string('destination');
            $table->string('starthrs');
            $table->string('end_hrs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skedules');
    }
};
