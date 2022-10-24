<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('lastname')->unique('clients');
            $table->integer('age');
            $table->string('city');
            $table->string('goal');
            $table->string('medical_history');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients_management');
    }
};
