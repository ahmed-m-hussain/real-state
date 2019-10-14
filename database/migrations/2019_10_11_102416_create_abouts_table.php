<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_title_en')->nullable();
            $table->string('text_title_en')->nullable();
            $table->text('description_en')->nullable();

            $table->string('page_title_it')->nullable();
            $table->string('text_title_it')->nullable();
            $table->text('description_it')->nullable();

            $table->string('page_title_de')->nullable();
            $table->string('text_title_de')->nullable();
            $table->text('description_de')->nullable();

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
        Schema::dropIfExists('abouts');
    }
}
