<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHighestEducationValueTable extends Migration
{
    public function up()
    {
        Schema::create('highest_education_value', function (Blueprint $table) {
            $table->id();
            $table->string('highest_education_value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('highest_education_value');
    }
}
