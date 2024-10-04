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
    {  Schema::create('app_clubs', function (Blueprint $table) {
        $table->id();
        $table->string("userId");
        $table->string("avatar");
        $table->string("token");
        $table->string("channel");
        $table->string("username");
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_clubs');
    }
};
