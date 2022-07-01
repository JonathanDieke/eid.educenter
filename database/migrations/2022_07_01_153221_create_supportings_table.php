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
        Schema::create('supportings', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('comment');

            $table->foreignId('user_school_formation_id')
                    ->constrained()
                    ->onUpdate("cascade")
                    ->onDelete("cascade");

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
        Schema::dropIfExists('supportings');
    }
};
