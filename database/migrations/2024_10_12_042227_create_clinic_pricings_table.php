<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clinic_pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Associate the pricing with the user
            $table->decimal('deworming', 8, 2); // Deworming price
            $table->decimal('consultation', 8, 2); // Consultation price
            $table->decimal('petgrooming', 8, 2); // Pet grooming price
            $table->decimal('vaccination', 8, 2); // Vaccination price
            $table->string('featured_photo'); // Store the image file name
            $table->timestamps();

            // Foreign key constraint to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic_pricings');
    }

};
