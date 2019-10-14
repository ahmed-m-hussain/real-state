<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('page_title_en', 1000)->nullable();
            $table->string('text_title_en', 1000)->nullable();
            $table->string('description_en', 1000)->nullable();

            $table->string('page_title_it', 1000)->nullable();
            $table->string('text_title_it', 1000)->nullable();
            $table->string('description_it', 1000)->nullable();

            $table->string('page_title_de', 1000)->nullable();
            $table->string('text_title_de', 1000)->nullable();
            $table->string('description_de', 1000)->nullable();

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
        Schema::dropIfExists('administration');
    }
}
