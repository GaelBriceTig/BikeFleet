<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_bikes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('rental_id');
            $table->foreign('rental_id')->references('id')->on('rentals');
            $table->unsignedInteger('bike_id');
            $table->foreign('bike_id')->references('id')->on('bikes');
            $table->decimal('price', 19, 4);
            $table->decimal('vat_rate', 19, 4);
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
        Schema::dropIfExists('rental_bikes');
    }
};
