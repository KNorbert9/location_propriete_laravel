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
        Schema::disableForeignKeyConstraints();
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->enum('status', ['sale', 'sold']);
            $table->integer('area');
            $table->integer('beds');
            $table->integer('baths');
            $table->integer('garage');
            $table->integer('plan');
            $table->integer('images');
            $table->timestamps();
            $table->unsignedBigInteger('property_type_id');
            $table->foreignId('property_types_id')
                ->references('id')
                ->on('property_types')
                ->onDelete('restricted')
                ->onUpdate('restricted');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
