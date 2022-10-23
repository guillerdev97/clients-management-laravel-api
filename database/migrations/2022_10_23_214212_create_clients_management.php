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
            $table->string('age');
            $table->string('city');
            $table->string('goal');
            $table->string('medical history');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients_management');
    }
};
