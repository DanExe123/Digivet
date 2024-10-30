<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietPlansTable extends Migration
{
    public function up()
    {
        Schema::create('diet_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade'); // Assuming pets table exists
            $table->string('dietary_needs');
            $table->string('morning_needs');
            $table->string('evening_meals');
            $table->string('treats');
            $table->string('water');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diet_plans');
    }
}
