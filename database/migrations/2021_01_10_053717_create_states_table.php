<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->unique();
            $table->string('abbreviation', 5)->unique();
            $table->foreignId('country_id');

        });

        Schema::table('states', function (Blueprint $table) {
            $table->foreign('country_id','country_state_id_fk')->references('id')->on('countries');
        });

        // Default states
        $states = [
            ['name' => 'Aguascalientes', 'abbreviation' => 'AG', 'country_id' => 1],
            ['name' => 'Baja California', 'abbreviation' => 'BC', 'country_id' => 1],
            ['name' => 'Baja California Sue', 'abbreviation' => 'BS', 'country_id' => 1],
            ['name' => 'Campeche', 'abbreviation' => 'CM', 'country_id' => 1],
            ['name' => 'Chiapas', 'abbreviation' => 'CS', 'country_id' => 1],
            ['name' => 'Chihuahua', 'abbreviation' => 'CH', 'country_id' => 1],
            ['name' => 'Ciudad de México', 'abbreviation' => 'CX', 'country_id' => 1],
            ['name' => 'Coahuila', 'abbreviation' => 'CO', 'country_id' => 1],
            ['name' => 'Colima', 'abbreviation' => 'CL', 'country_id' => 1],
            ['name' => 'Durango', 'abbreviation' => 'DG', 'country_id' => 1],
            ['name' => 'Guanajuato', 'abbreviation' => 'GT', 'country_id' => 1],
            ['name' => 'Guerrero', 'abbreviation' => 'GR', 'country_id' => 1],
            ['name' => 'Hidalgo', 'abbreviation' => 'HG', 'country_id' => 1],
            ['name' => 'Jalisco', 'abbreviation' => 'JC', 'country_id' => 1],
            ['name' => 'México', 'abbreviation' => 'EM', 'country_id' => 1],
            ['name' => 'Michoacán', 'abbreviation' => 'MI', 'country_id' => 1],
            ['name' => 'Morelos', 'abbreviation' => 'MO', 'country_id' => 1],
            ['name' => 'Nayarit', 'abbreviation' => 'NA', 'country_id' => 1],
            ['name' => 'Nuevo León', 'abbreviation' => 'NL', 'country_id' => 1],
            ['name' => 'Oaxaca', 'abbreviation' => 'OA', 'country_id' => 1],
            ['name' => 'Puebla', 'abbreviation' => 'PU', 'country_id' => 1],
            ['name' => 'Querétaro', 'abbreviation' => 'QT', 'country_id' => 1],
            ['name' => 'Quintana Roo', 'abbreviation' => 'QR', 'country_id' => 1],
            ['name' => 'San Luis Potosí', 'abbreviation' => 'SL', 'country_id' => 1],
            ['name' => 'Sinaloa', 'abbreviation' => 'SI', 'country_id' => 1],
            ['name' => 'Sonora', 'abbreviation' => 'SO', 'country_id' => 1],
            ['name' => 'Tabasco', 'abbreviation' => 'TB', 'country_id' => 1],
            ['name' => 'Tamaulipas', 'abbreviation' => 'TM', 'country_id' => 1],
            ['name' => 'Tlaxcala', 'abbreviation' => 'TL', 'country_id' => 1],
            ['name' => 'Veracruz', 'abbreviation' => 'VE', 'country_id' => 1],
            ['name' => 'Yucatán', 'abbreviation' => 'YU', 'country_id' => 1],
            ['name' => 'Zacatecas', 'abbreviation' => 'ZA', 'country_id' => 1]
        ];

        foreach ($states as $state) {
            \Illuminate\Support\Facades\DB::table('states')->insert($state);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('states', function (Blueprint $table) {
            $table->dropForeign('country_state_id_fk');
        });

        Schema::dropIfExists('states');
    }
}
