<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->unique();
            $table->string('abbreviation', 5)->unique();
        });

        // Default countries
        $countries = [
            ['name' => 'México', 'abbreviation' => 'MX']
        ];

        foreach ($countries as $country) {
            \Illuminate\Support\Facades\DB::table('countries')->insert($country);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
