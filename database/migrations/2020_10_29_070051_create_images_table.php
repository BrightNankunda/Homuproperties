<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->integer('boss_id')->unsigned()->onDelete('cascade');
            $table->string('name');
            $table->string('type');
            $table->string('status')->nullable();
            $table->string('astatus')->nullable();
            $table->string('hstatus')->nullable();
            $table->string('category');
            $table->string('location');
            $table->string('address');
            $table->string('street');
            $table->string('description');
            $table->string('rooms');
            $table->string('floor');
            $table->string('amount');
            $table->string('rent');
            $table->string('contact');
            $table->string('front');
            $table->string('image');
            $table->string('photo');
            $table->string('imageone');
            $table->string('imagetwo');
            $table->string('secret');
            $table->boolean('paid');
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
        Schema::dropIfExists('images');
    }
}
