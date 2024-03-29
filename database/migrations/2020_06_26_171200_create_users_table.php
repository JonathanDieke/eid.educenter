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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lname');
            $table->string('email')->unique();
            $table->date('birthdate');
            $table->enum('gender', ["male", "female"]);
            $table->enum('native_language', ["french", "english", "spanish", "russian"]);
            $table->enum('use_language', ["french", "english", "spanish", "russian"]);

            $table->mediumInteger('state')->unsigned()->nullable();
            $table->mediumInteger('city')->unsigned()->nullable();
            $table->mediumInteger('country')->unsigned()->nullable();


            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user')->nullable();
            $table->rememberToken();

            // $table->foreignId("address_id")->nullable()->constrained();
            // $table->foreignId("cursus_id")->nullable()->constrained();

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
        Schema::dropIfExists('users');
    }
};
