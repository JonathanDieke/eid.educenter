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
        Schema::create('admission_requests', function (Blueprint $table) {
            $table->id();
            $table->enum("session", ["autumn", "winter", "summer"]);
            $table->enum("cycle", ["first", "second", "third"]);

            $table->foreignId("user_id")->constrained();
            $table->foreignId("school_id")->constrained();
            $table->foreignId("program_id")->constrained();

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
        Schema::dropIfExists('admission_requests');
    }
};
