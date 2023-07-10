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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('profile_name');
            $table->string('father_name');
            $table->date('DOB');
            $table->string('work_location');
            $table->string('work_address');
            $table->string('email')->unique();
            $table->string('contact_number', 10)->unique();
            $table->unsignedBigInteger('line_manager_id');
            $table->foreign('line_manager_id')->references('id')->on('users')->nullable();
            $table->unsignedBigInteger('vertical_id');
            $table->foreign('vertical_id')->references('id')->on('vertical');
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id')->references('id')->on('designations');
            $table->unsignedBigInteger('highest_educational_qualification_id');
            $table->foreign('highest_educational_qualification_id')->references('id')->on('highest_education_value');
            $table->string('image')->nullable()->default('user.png');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
