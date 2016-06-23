<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('lesson_id')->unsigned();
            $table->float('grade');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lesson_id')->references('id')->on('lessons');

            $table->unique(['user_id', 'lesson_id'], 'composite_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grades');
    }
}
