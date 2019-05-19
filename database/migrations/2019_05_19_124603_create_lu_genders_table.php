<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lu_genders', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('value',   30)->unique();
            $table->string('short',   10)->nullable()->unique();
            $table->string('article', 10)->nullable()->unique();
            $table->string('title',   10)->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lu_genders');
    }
}
