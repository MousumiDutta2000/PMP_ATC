<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectItemStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('project_item_statuses', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Under discussion', 'Under development', 'In queue', 'Not Started', 'Pending', 'Delay']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_item_statuses');
    }
}
