<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_meal_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('days');
            $table->string('month_par');
            $table->string('sex');
            $table->integer('age');
            $table->integer('height');
            $table->string('weight');
            $table->json('goal');
            $table->string('weight_aim')->nullable();
            $table->integer('weight_time_aim')->nullable();
            $table->json('activity');
            $table->integer('calories');
            $table->integer('main_meal');
            $table->integer('snack_meal');
            $table->json('food_options');
            $table->json('daymeal');
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
        Schema::dropIfExists('user_meal_plans');
    }
};
