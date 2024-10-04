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
    {  Schema::create('ratings', function (Blueprint $table) {
        $table->id();
        $table->string("raterUsername");
        $table->string("ownerUsername");
        $table->string("Communication");
        $table->string("Honesty");
        $table->string("Respect");
        $table->string("Reliability");
        $table->string("Compatibility");
        $table->string("Experience");
        $table->string("Safety");
        $table->string("Authenticity");
        $table->string("Effort");
        $table->string("Recommendation");
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
