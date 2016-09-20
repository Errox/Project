<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ToolboxQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toolbox_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->string('description');
            $table->integer('toolbox_chapter_id');
            $table->integer('toolbox_settings_id');
            $table->integer('active')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('toolbox_questions');
    }
}
