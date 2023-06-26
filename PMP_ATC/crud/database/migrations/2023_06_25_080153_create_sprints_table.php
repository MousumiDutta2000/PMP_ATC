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
            $table->string('sprint_name');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->enum('is_global_sprint', ['yes', 'no']);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Under discussion', 'Under development', 'In queue', 'Not Started', 'Pending', 'Delay']);
            $table->string('assigned_to');
            $table->string('assigned_by');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('project')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sprints');
    }
}