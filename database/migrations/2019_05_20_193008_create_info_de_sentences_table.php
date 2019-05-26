<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoDeSentencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_de_sentences', function (Blueprint $table) {
            $table->unsignedInteger('de_sentence_id'); // [PK] FK

            $table->unsignedSmallInteger('proficiency_level_id')->nullable(); // FK    
            $table->unsignedSmallInteger('difficulty_level_id')->nullable(); // FK          
            $table->unsignedSmallInteger('priority_level_id')->nullable();  // FK
            $table->unsignedSmallInteger('source_id')->nullable();  // FK

            $table->string('week_no', 10)->nullable(); // AUTO
            $table->boolean('is_stared')->default(FALSE); // BOOL
            $table->unsignedSmallInteger('revision_deck_id')->nullable(); // FK 

            $table->unsignedMediumInteger('no_visited')->default(0);
            $table->unsignedMediumInteger('no_wrong')->default(0);
            $table->unsignedMediumInteger('no_correct')->default(0);
            $table->timestamp('last_visited_on')->nullable();
            
            $table->text('comment')->nullable();
        });

        Schema::table('info_de_sentences', function (Blueprint $table) {
            $table->primary([ 'de_sentence_id' ]);
            $table->foreign('de_sentence_id')->references('id')->on('de_sentences');

            $table->foreign('proficiency_level_id')->references('id')->on('lu_proficiency_levels'); // FK
            $table->foreign('priority_level_id')->references('id')->on('lu_priority_levels'); // FK
            $table->foreign('difficulty_level_id')->references('id')->on('lu_difficulty_levels'); // FK
            $table->foreign('source_id')->references('id')->on('lu_sources'); // FK
            $table->foreign('revision_deck_id')->references('id')->on('lu_revision_decks'); // FK
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('de_sentence_infos');
    }
}
