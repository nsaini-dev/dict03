<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoDePreposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_de_prepos', function (Blueprint $table) {
            $table->unsignedInteger('de_word_id');                      // PK + FK

            $table->unsignedSmallInteger('prepo_case_id');                 // FK
            $table->unsignedSmallInteger('wo_wann_case_id')->nullable();   // FK
            $table->unsignedSmallInteger('wohin_case_id')->nullable();     // FK
            $table->unsignedSmallInteger('wie_case_id')->nullable();       // FK
        });

        Schema::table('info_de_prepos', function (Blueprint $table) {
            $table->primary('de_word_id');
            $table->foreign('de_word_id')->references('id')->on('de_words');

            $table->foreign('prepo_case_id')->references('id')->on('lu_word_cases');
            $table->foreign('wo_wann_case_id')->references('id')->on('lu_word_cases');
            $table->foreign('wohin_case_id')->references('id')->on('lu_word_cases');
            $table->foreign('wie_case_id')->references('id')->on('lu_word_cases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('de_word_prepo_infos');
    }
}
