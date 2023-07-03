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
        Schema::create('user_technologies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_name');
            $table->foreign('profile_name')->references('id')->on('users');
            $table->unsignedBigInteger('project_role_id');
            $table->foreign('project_role_id')->references('id')->on('project_role');
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')->references('id')->on('technologies');
            $table->text('details');
            $table->integer('years_of_experience');
            $table->boolean('is_current_company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_technologies');
    }
};
