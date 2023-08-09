<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commented_by');
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('task_id');
            $table->timestamps();

            // Add a foreign key constraint for the task_id field
            
            $table->foreign('commented_by')->references('id')->on('profiles');
            $table->foreign('user')->references('id')->on('profiles');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
