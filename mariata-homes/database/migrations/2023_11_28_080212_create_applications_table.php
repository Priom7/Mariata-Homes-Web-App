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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dob');
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('next_of_kin')->nullable();
            $table->string('age');
            $table->string('passport_photo');
            $table->string('illness');
            $table->string('last_residence_address')->nullable();
            $table->string('recommended_source_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
