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
            // $table->unsignedBigInteger('sprint_id');
            $table->unsignedBigInteger('type');
            $table->enum('priority', ['Low priority', 'Med Priority', 'High priority']);
            $table->text('details');
            // $table->string('attachments')->nullable();
            // $table->unsignedBigInteger('assigned_to');

            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('last_edited_by');

            // $table->string('estimated_time'); 
            // $table->string('time_taken');

            $table->string('status');
            // $table->unsignedBigInteger('parent_task')->nullable();

            // $table->foreign('sprint_id')->references('id')->on('sprints');
            // $table->foreign('type')->references('id')->on('project');
            // $table->foreign('parent_task')->references('id')->on('tasks');

            $table->string('assigned_to');
            $table->date('due_date');
            // $table->foreign('assigned_to')->references('id')->on('profiles');

            // $table->foreign('created_by')->references('id')->on('profiles');
            // $table->foreign('last_edited_by')->references('id')->on('profiles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
