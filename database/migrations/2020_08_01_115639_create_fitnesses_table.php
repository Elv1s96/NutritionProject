<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFitnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitnesses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('gender');
            $table->tinyInteger('growth',false,255);
            $table->tinyInteger('starting_weight');
            $table->tinyInteger('current_weight');
            $table->tinyInteger('age');
            $table->integer('without_changing_the_weight');
            $table->integer('weight_loss');
            $table->integer('rapid_weight_loss');
            $table->tinyInteger('exercise_stress');
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
        Schema::dropIfExists('fitnesses');
    }
}
