<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintsTable extends Migration
{
    public function up()
    {
        Schema::create('sprints', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('sprint_name');
            $table->enum('is_global_sprint', ['yes', 'no']);
            $table->unsignedBigInteger('project_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Under discussion', 'Under development', 'In queue', 'Not Started', 'Pending', 'Delay']);
            $table->unsignedBigInteger('assigned_to');
            $table->unsignedBigInteger('assigned_by');

            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('project')->onDelete('set null');
            $table->foreign('assigned_to')->references('id')->on('users');
            $table->foreign('assigned_by')->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::dropIfExists('sprints');
    }
}
