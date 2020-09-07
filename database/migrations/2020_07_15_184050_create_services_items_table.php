<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('quantity');
            $table->string('description');
            $table->unsignedDecimal('unit_price',8,2);
            $table->unsignedDecimal('price',8,2);
            $table->unsignedDecimal('tax',8,2);
            $table->unsignedDecimal('final_price',8,2);
            $table->foreignId('service_id');
            $table->timestamps();
        });

        Schema::table('services_items', function (Blueprint $table) {
            $table->foreign('service_id','service_id_fk')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services_items', function (Blueprint $table) {
            $table->dropForeign('service_id_fk');
        });

        Schema::dropIfExists('services_items');
    }
}
