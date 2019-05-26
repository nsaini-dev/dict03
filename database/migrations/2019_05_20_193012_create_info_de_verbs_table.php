<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoDeVerbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_de_verbs', function (Blueprint $table) {
            $table->unsignedInteger('de_word_id');  
            
            $table->unsignedSmallInteger('verb_case_id')->nullable();  
            $table->string('infinitive', 90)->nullable();  
            $table->string('perfekt', 90)->nullable(); 
            $table->string('praeteritum', 90)->nullable(); 

            $table->text('conjugation')->nullable();
        });

        Schema::table('info_de_verbs', function (Blueprint $table) {
            $table->primary('de_word_id');
            $table->foreign('de_word_id')->references('id')->on('de_words');

            $table->foreign('verb_case_id')->references('id')->on('lu_word_cases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('de_word_verb_infos');
    }
}
