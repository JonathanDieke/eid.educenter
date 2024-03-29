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
        Schema::create('user_school_formations', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->mediumInteger("country")->unsigned();
            $table->mediumInteger("state")->unsigned();

            // $table->foreign('country')->references('id')->on('countries');
            // $table->foreign('state')->references('id')->on('states');

            $table->string("type");
            $table->string("program_name");
            $table->enum("status", ["abandoned", "in_progress", "terminated"]);
            $table->date("start_date");
            $table->date("end_date");

            $table->foreignId("user_id")
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('user_school_formations');
    }
};
