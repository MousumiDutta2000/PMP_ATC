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
        Schema::create('project_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('project_members_id'); // Corrected foreign key
            $table->unsignedBigInteger('project_role_id');    // Corrected foreign key
            $table->foreign('project_id')->references('id')->on('project');
            $table->foreign('project_members_id')->references('id')->on('users');           // Corrected foreign key
            $table->foreign('project_role_id')->references('id')->on('project_role');      // Corrected foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_members');
    }
};
