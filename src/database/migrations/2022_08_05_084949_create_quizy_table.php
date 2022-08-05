<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefectures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prefecture_id');
            $table->string('image');

        });
        Schema::create('choices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->string('name');
            $table->boolean('valid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prefectures');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('choices');
    }
}
