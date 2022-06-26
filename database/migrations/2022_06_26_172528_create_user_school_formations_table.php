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


            $table->string("type");
            $table->string("program_name");
            $table->enum("status", ["abandoned", "in_progress", "terminated"]);
            $table->date("start_date");
            $table->date("end_date");

            $table->foreignId("user_school_id")->constrained();

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
