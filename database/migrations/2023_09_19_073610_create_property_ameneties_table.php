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
        Schema::create('property_ameneties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('ameneties_id');
            $table->foreignId('ameneties_id')
            ->references('id')
                ->on('ameneties')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('property_id');
            $table->foreignId('property_id')
            ->references('id')
                ->on('properties')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_ameneties');
    }
};
