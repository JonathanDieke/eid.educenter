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
        Schema::create('cursuses', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_living_in_russian');
            $table->enum('legal_status', ["foreign", "local", "permanent_resident"]);
            $table->enum('primary_studies_language', ["french", "english", "spanish", "russian"]);
            $table->enum('secondary_studies_language', ["french", "english", "spanish", "russian"]);
            $table->boolean('is_has_russian_college_diploma');
            $table->boolean('is_has_russian_high_school_diploma');
            $table->boolean('is_study_in_russian_university');
            $table->boolean('is_study_in_university');

            $table->foreignId("user_id")->nullable()->constrained();

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
        Schema::dropIfExists('cursuses');
    }
};
