<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->integer('parent_id')->nullable();
            $table->text('description');
            $table->integer('created_by')->nullable();
            $table->integer('modified_by')->nullable();            
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
        Schema::dropIfExists('certification_areas');
    }
}
