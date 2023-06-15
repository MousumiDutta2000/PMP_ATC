<?php
// database/migrations/<timestamp>_create_technologies_table.php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnologiesTable extends Migration
{
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('technology_name');
            $table->string('expertise');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('technologies');
    }
}
