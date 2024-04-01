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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('routeID');
            //$table->foreign('routeID')->references('id')->on('tickets')->onDelete('set null');
            $table->string('ticketID');
            $table->unsignedBigInteger('passengerID');
            $table->string('from');
            $table->string('to');
            $table->string('status');
            $table->string('starttime');
            $table->string('departuretime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
