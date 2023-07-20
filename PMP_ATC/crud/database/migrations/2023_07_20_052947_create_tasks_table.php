<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('title');
            $table->enum('type', ['Feature', 'User story']);
            $table->enum('priority', ['Low priority', 'Med Priority', 'High priority']);
            $table->text('details');
            $table->string('attachments')->nullable();
            $table->string('assigned_to');
            $table->string('created_by');
            $table->string('last_edited_by');
            $table->datetime('estimated_time'); 
            $table->datetime('time_taken');
            $table->enum('status', ['not started', 'ongoing', 'hold', 'completed']);
            $table->unsignedBigInteger('parent_task')->nullable();
            $table->foreign('parent_task')->references('id')->on('tasks');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
