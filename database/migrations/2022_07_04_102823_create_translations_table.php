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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['pending', 'success', 'cancelled'])->default('pending');
            $table->string('original_file');
            $table->string('translated_file')->nullable();
            $table->string('comment');

            $table->foreignId("user_id")
                    ->nullable()
                    ->constrained()
                    ->nullOnDelete();

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
        Schema::dropIfExists('translations');
    }
};
