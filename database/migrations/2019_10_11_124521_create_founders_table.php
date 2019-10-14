<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('founders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('about_id')->unsigned()->index();
            $table->string('avatar')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();

            $table->text('expert_info_en')->nullable();
            $table->string('specialty_en')->nullable();
            $table->string('position_en')->nullable();

            $table->text('expert_info_it')->nullable();
            $table->string('specialty_it')->nullable();
            $table->string('position_it')->nullable();

            $table->text('expert_info_de')->nullable();
            $table->string('specialty_de')->nullable();
            $table->string('position_de')->nullable();

            $table->timestamps();



            $table->foreign('about_id')
                ->references('id')->on('abouts')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('founders');
    }
}
