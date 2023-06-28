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
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('project_type');
            $table->unsignedBigInteger('Project_manager_id');
            $table->foreign('Project_manager_id')->references('id')->on('users');
            $table->text('project_description');
            $table->string('client_spoc_name');
            $table->string('client_spoc_email');
            $table->string('client_spoc_contact');
            $table->date('project_startDate');
            $table->date('project_endDate');
            $table->string('project_status');
            $table->unsignedBigInteger('vertical_id');
            $table->foreign('vertical_id')->references('id')->on('vertical');
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')->references('id')->on('technologies');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('project_members_id');
            $table->foreign('project_members_id')->references('id')->on('users');
            $table->unsignedBigInteger('project_role_id');
            $table->foreign('project_role_id')->references('id')->on('project_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
