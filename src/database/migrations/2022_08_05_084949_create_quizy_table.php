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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->dateTime('email_verified_at');
            $table->string('password');
            $table->string('remember_token');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
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
        Schema::dropIfExists('users');
    }
}
