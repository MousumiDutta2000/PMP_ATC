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
        Schema::create('project_member', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active');
            $table->boolean('is_project_admin');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('project_role_id');
            // $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('project_id')->references('id')->on('project');
            $table->foreign('project_role_id')->references('id')->on('project_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_member');
    }
};
