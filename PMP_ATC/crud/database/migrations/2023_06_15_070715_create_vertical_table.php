<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerticalTable extends Migration
{
    public function up()
    {
        Schema::create('vertical', function (Blueprint $table) {
            $table->id();
            $table->string('vertical_name');
            $table->string('vertical_head_name');
            $table->string('vertical_head_emailId');
            $table->string('vertical_head_contact');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vertical');
    }
}
