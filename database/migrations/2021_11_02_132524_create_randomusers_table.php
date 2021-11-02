<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRandomusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('randomusers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->tinyInteger('age', false, true);
            $table->enum('gender', ['male', 'female']);
            $table->string('city', 50);
            $table->string('country', 50);
            $table->char('salt', 8);
            $table->char('passwsha256', 64);
            $table->string('image_url', 60);
            $table->binary('image');
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
        Schema::dropIfExists('randomusers');
    }
}
