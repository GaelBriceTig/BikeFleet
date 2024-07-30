<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_rental', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->unsignedInteger('rental_id');
            $table->foreign('rental_id')->references('id')->on('rental');
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
        Schema::dropIfExists('material_rental');
    }
};
