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
        Schema::create('meet_up_users', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->string("email_address");
            $table->string("phone_number");
            $table->string("profile_image");
            $table->string("company_name");
            $table->string("experienced_years");
            $table->string("heard_about_us");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meet_up_users');
    }
};
