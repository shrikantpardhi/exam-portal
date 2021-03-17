<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email');
            $table->string('mobile');
            $table->string('password');
            $table->string('qualification')->nullable();
            $table->string('city')->nullable();
            $table->string('exam_prepare')->nullable();
            $table->string('subscription_status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user_profile');
    }
}
