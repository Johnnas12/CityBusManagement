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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->integer('busnum');
            $table->string('from');
            $table->string('to');
            $table->string('via');
            $table->string('driver');
            $table->string('starttime');
            $table->string('departuretime');
            $table->float('price');
            $table->float('distance');
            $table->integer('availableseats');
            $table->text('reserved');
            $table->text('unreserved');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
