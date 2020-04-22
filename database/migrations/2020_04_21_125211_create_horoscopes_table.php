<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoroscopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horoscopes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('access_date');
            $table->string('name', 50);
            $table->string('entirety_desc', 1000);
            $table->string('love_desc', 1000);
            $table->string('career_desc', 1000);
            $table->string('wealth_desc', 1000);                                    
            $table->integer('entirety_rating');
            $table->integer('love_rating');
            $table->integer('career_rating');
            $table->integer('wealth_rating');
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
        Schema::dropIfExists('horoscopes');
    }
}
