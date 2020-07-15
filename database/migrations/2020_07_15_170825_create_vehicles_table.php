<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate',20);
            $table->string('serial_number',40)->nullable();
            $table->string('make',50);
            $table->string('model',50);
            $table->unsignedSmallInteger('year');
            $table->string('engine',5);
            $table->unsignedTinyInteger('cylinder_count');
            $table->string('transmission',40);
            $table->string('drivetrain',40)->nullable();
            $table->string('fuel',40);
            $table->string('color',40)->nullable();
            $table->foreignId('customer_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('plate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
