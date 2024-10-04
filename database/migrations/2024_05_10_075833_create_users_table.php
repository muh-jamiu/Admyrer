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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("username")->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("avatar")->nullable();
            $table->json("photos")->nullable();
            $table->string("address")->nullable();
            $table->string("gender")->nullable();
            $table->string("ip_address")->nullable();
            $table->string("type")->nullable("user");
            $table->string("phone_number")->nullable();
            $table->string("lat")->nullable();
            $table->string("lng")->nullable();
            $table->string("birthday")->nullable();
            $table->string("country")->nullable();
            $table->string("lastseen")->nullable();
            $table->string("verified")->nullable();
            $table->string("height")->nullable();
            $table->string("hair_color")->nullable();
            $table->string("interest")->nullable();
            $table->string("state")->nullable();
            $table->string("location")->nullable();
            $table->string("relationship")->nullable();
            $table->string("work_status")->nullable();
            $table->string("education")->nullable();
            $table->string("body")->nullable();
            $table->string("character")->nullable();
            $table->string("ethnicity")->nullable();
            $table->string("children")->nullable();
            $table->string("friends")->nullable();
            $table->json("pets")->nullable();
            $table->string("live_with")->nullable();
            $table->string("car")->nullable();
            $table->string("religion")->nullable();
            $table->boolean("smoke")->nullable();
            $table->boolean("drink")->nullable();
            $table->boolean("travel")->nullable();
            $table->string("music")->nullable();
            $table->string("city")->nullable();
            $table->string("hobby")->nullable();
            $table->string("color")->nullable();
            $table->string("hot_count")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
