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
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_edited_by');
            $table->string('estimated_time'); 
            $table->string('time_taken');
            $table->enum('status', ['not started', 'ongoing', 'hold', 'completed']);
            $table->unsignedBigInteger('parent_task')->nullable();
            $table->foreign('parent_task')->references('id')->on('tasks');
            $table->foreign('assigned_to')->references('id')->on('profiles')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('profiles');
            $table->foreign('last_edited_by')->references('id')->on('profiles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
