<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityStatusTable extends Migration
{
    public function up()
    {
        Schema::create('opportunity_status', function (Blueprint $table) {
            $table->id();
            $table->enum('project_goal', ['Achieved', 'Lost']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opportunity_status');
    }
}
