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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('title');
            $table->enum('priority', ['Low priority', 'Med Priority', 'High priority']);
            // $table->string('priority');
            $table->string('estimated_time'); 
            // $table->enum('priority', ['Low priority', 'Med Priority', 'High priority']);
            $table->text('details');
            $table->string('assigned_to');
<<<<<<< HEAD:PMP_ATC/crud/database/migrations/2023_08_05_105617_create_tasks_table.php
            $table->unsignedBigInteger('status');
            $table->foreign('status')->references('id')->on('project_task_status')->onDelete('cascade');
=======
            $table->string('status');
>>>>>>> b0da45e364babb0014116dabb0ea17d25afaec99:PMP_ATC/crud/database/migrations/2023_07_19_105617_create_tasks_table.php
            
            // $table->date('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
