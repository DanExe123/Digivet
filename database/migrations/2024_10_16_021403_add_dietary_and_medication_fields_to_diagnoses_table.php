<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDietaryAndMedicationFieldsToDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diagnoses', function (Blueprint $table) {
            $table->text('dietary_needs')->nullable();
            $table->text('morning_needs')->nullable();
            $table->text('evening_meals')->nullable();
            $table->text('treats')->nullable();
            $table->text('water')->nullable();
            $table->string('medication')->nullable();
            $table->string('dosage')->nullable();
            $table->string('frequency')->nullable();
            $table->string('duration')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diagnoses', function (Blueprint $table) {
            $table->dropColumn([
                'dietary_needs',
                'morning_needs',
                'evening_meals',
                'treats',
                'water',
                'medication',
                'dosage',
                'frequency',
                'duration',
                'notes'
            ]);
        });
    }
}
