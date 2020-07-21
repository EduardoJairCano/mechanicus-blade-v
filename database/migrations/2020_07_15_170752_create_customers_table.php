<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',150);
            $table->string('last_name',150);
            $table->string('rfc',20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('cell_phone_number',20)->nullable();
            $table->string('slug')->unique();
            $table->foreignId('address_id');
            $table->foreignId('user_id');
            $table->foreignId('company_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('rfc');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
