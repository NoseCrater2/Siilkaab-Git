<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regimes', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->boolean('special')->default(false);
            $table->boolean('only_room')->required()->default(false);
            $table->date('start_period');
            $table->date('final_period');
            $table->double('lodging_breakfast_children');
            $table->double('lodging_breakfast_adult');
            $table->double('half_pension_children');
            $table->double('half_pension_adult');
            $table->double('full_pension_children');
            $table->double('full_pension_adult');
            $table->double('all_included_children');
            $table->double('all_included_adult');
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->index()->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regimes');
    }
}
