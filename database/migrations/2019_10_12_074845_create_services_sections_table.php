<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('real_estate_appraisal_id')->unsigned()->index();
            $table->string('name_en')->nullable();
            $table->string('name_it')->nullable();
            $table->string('name_de')->nullable();
            $table->string('font')->nullable();
            $table->timestamps();

            $table->foreign('real_estate_appraisal_id')
                ->references('id')->on('real_estate_appraisals')
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
        Schema::dropIfExists('services_sections');
    }
}
