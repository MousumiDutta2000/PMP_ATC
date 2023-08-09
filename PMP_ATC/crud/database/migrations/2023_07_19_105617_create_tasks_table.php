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
            $table->string('status');
            
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
