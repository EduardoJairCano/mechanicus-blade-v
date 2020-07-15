<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysCurrentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('address_id','user_address_id_fk')->references('id')->on('addresses');
        });

        Schema::table('users_info', function (Blueprint $table) {
            $table->foreign('user_id', 'user_info_id_fk')->references('id')->on('users');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('address_id','customer_address_id_fk')->references('id')->on('addresses');
            $table->foreign('user_id', 'customer_user_id_fk')->references('id')->on('users');
            $table->foreign('company_id', 'customer_company_id_fk')->references('id')->on('companies');
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->foreign('address_id','company_address_id_fk')->references('id')->on('addresses');
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->foreign('customer_id','vehicle_customer_id_fk')->references('id')->on('customers');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreign('vehicle_id','service_vehicle_id_fk')->references('id')->on('vehicles');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('address_id_fk');
        });

        Schema::table('users_info', function (Blueprint $table) {
            $table->dropForeign('user_id_fk');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign('address_id_fk');
            $table->dropForeign('user_id_fk');
            $table->dropForeign('company_id_fk');
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('address_id_fk');
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign('customer_id_fk');
        });

        Schema::table('services_items', function (Blueprint $table) {
            $table->dropForeign('service_id_fk');
        });
    }
}
