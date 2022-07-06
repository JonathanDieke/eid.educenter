<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();

            $table->mediumInteger('country')->unsigned()->nullable();
            $table->mediumInteger('state')->unsigned()->nullable();
            $table->mediumInteger('city')->unsigned()->nullable();

            // $table->foreign('state')->references('id')->on('states');
            // $table->foreign('city')->references('id')->on('cities');
            // $table->foreign('country')->references('id')->on('countries');

            $table->string('postal_code')->nullable();
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();

            $table->foreignId("user_id")->constrained();

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
        Schema::dropIfExists('addresses');
    }
};
