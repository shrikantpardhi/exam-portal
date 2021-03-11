<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('desc')->nullable();
            $table->string('category');
            $table->string('subjects');
            $table->tinyInteger('total_questions');
            $table->float('pos_mark')->default(1);
            $table->float('neg_mark')->default(0);
            $table->float('passing_mark');
            $table->float('total_mark');
            $table->tinyInteger('total_attempt')->default(1);
            $table->string('price');
            $table->string('status');
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
        Schema::dropIfExists('exam');
    }
}
