<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_level', function (Blueprint $table) {
            $table->id('education_level_id');
            $table->timestamps();
            $table->string('education_level_title');
            $table->string('education_level_desc');
            $table->boolean('active');
            $table->longText('memo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educational_level');
    }
}