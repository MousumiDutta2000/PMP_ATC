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
            $table->string('project_manager');
            $table->text('project_description');
            $table->string('client_spoc_name');
            $table->string('client_spoc_email');
            $table->string('client_spoc_contact');
            $table->date('project_startDate');
            $table->date('project_endDate');
            $table->string('project_status');
            $table->unsignedBigInteger('vertical_id');
            $table->foreign('vertical_id')->references('id')->on('vertical');
            $table->unsignedBigInteger('technologies_id');
            $table->foreign('technologies_id')->references('id')->on('technologies');
            $table->unsignedBigInteger('clients_id');
            $table->foreign('clients_id')->references('id')->on('clients');
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
