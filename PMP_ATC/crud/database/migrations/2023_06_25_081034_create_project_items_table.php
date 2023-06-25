<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectItemsTable extends Migration
{
    public function up()
    {
        Schema::create('project_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->text('details');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('sprint_id');
            $table->enum('status', ['Under discussion', 'Under development', 'In queue', 'Not Started', 'Pending', 'Delay']);
            $table->date('expected_delivery');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('assigned_to');
            $table->string('assigned_by');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('project');
            $table->foreign('item_id')->references('id')->on('project_item_statuses');
            $table->foreign('sprint_id')->references('id')->on('sprints');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_items');
    }
}
