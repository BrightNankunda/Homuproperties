<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('clientName');
            $table->string('clientContact');
            $table->string('propertyName');
            $table->string('monthsPaid')->nullable();
            $table->string('roomNumber')->nullable();
            $table->string('accessNumber')->nullable();
            $table->boolean('paid')->default(true);
            $table->boolean('verified')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
