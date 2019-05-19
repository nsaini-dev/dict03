<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuPriorityLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lu_priority_levels', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('value', 30)->unique();
            $table->string('short', 10)->nullable()->unique();
            $table->boolean('active')->default(TRUE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lu_priority_levels');
    }
}
