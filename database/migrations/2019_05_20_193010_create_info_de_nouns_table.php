<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoDeNounsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_de_nouns', function (Blueprint $table) {
            $table->unsignedInteger('de_word_id');

            $table->unsignedSmallInteger('gender_id'); 
            $table->string('plural', 90)->nullable();
        });

        Schema::table('info_de_nouns', function (Blueprint $table) {
            $table->primary('de_word_id');
            $table->foreign('de_word_id')->references('id')->on('de_words');
            
            $table->foreign('gender_id')->references('id')->on('lu_genders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('de_word_noun_infos');
    }
}
