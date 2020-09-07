<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->string('serial', 5);
            $table->unsignedInteger('invoice_number');
            $table->unsignedInteger('millage');
            $table->string('comment')->nullable();
            $table->foreignId('vehicle_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreign('vehicle_id','service_vehicle_id_fk')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign('service_vehicle_id_fk');
        });

        Schema::dropIfExists('services');
    }
}
