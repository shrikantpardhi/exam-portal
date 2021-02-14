<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('op1');
            $table->text('op2');
            $table->text('op3')->nullable();
            $table->text('op4')->nullable();
            $table->string('answer');
            $table->text('ans_description')->nullable();
            $table->string('ans_image')->nullable();
            $table->string('subject');
            $table->string('categories');
            $table->string('level');
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
        Schema::dropIfExists('questions');
    }
}
