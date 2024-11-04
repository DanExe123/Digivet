<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    public function up()
    {
        // Check if the table already exists before creating it
        if (!Schema::hasTable('histories')) {
            Schema::create('histories', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('pet_id'); 
                $table->string('patient_name');
                $table->text('dietary_needs')->nullable();
                $table->text('morning_meals')->nullable();
                $table->text('evening_meals')->nullable();
                $table->text('treats')->nullable();
                $table->text('water')->nullable();
                $table->timestamps();

                // Foreign key constraint
                $table->foreign('pet_id')->references('id')->on('my_pets')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        // Drop the entire table if it exists
        Schema::dropIfExists('histories');
    }
}
