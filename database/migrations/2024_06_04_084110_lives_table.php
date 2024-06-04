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
    {  Schema::create('lives', function (Blueprint $table) {
        $table->id();
        $table->string("userId");
        $table->string("username");
        $table->string("avatar");
        $table->string("gender");
        $table->string("name");
        $table->string("country");
        $table->string("liveId");
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lives');
    }
};
