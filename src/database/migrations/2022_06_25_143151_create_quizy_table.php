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
        Schema::create('quizy', function (Blueprint $table) {
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
    // rollbackするとdownメソッド実行
    {
        Schema::dropIfExists('quizy');
    }
}
