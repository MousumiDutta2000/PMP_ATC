<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWorkDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user_work_details', function (Blueprint $table) {
            $table->id();

            // Foreign key for project_id referencing the 'id' column in the 'projects' table
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');

            // Foreign key for task_id referencing the 'id' column in the 'tasks' table
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');

            // Foreign key for profile_id referencing the 'id' column in the 'profiles' table
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');

            $table->text('notes')->nullable();
            $table->string('project_manager');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_work_details');
    }
}
