<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateScoresTable
 */
class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('score_time');
            $table->integer('player_id')->unsigned();
            $table->integer('period_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('period_id')->references('id')->on('periods');
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
        Schema::dropIfExists('scores');
    }
}
