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
        // Check if the appointments table does not exist before creating it
        if (!Schema::hasTable('appointments')) {
            Schema::create('appointments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
                $table->foreignId('clinic_owner_id')->constrained('clinics')->onDelete('cascade'); // Foreign key to clinics table
                $table->string('pet_name');
                $table->string('clinicname');
                $table->string('services');
                $table->string('gender');
                $table->string('breed');
                $table->date('birthdate');
                $table->date('appointment_date');
                $table->string('service_type'); // Home Service or Walk-in
                $table->boolean('agreed_cancellation')->default(false);
                $table->boolean('agreed_payment')->default(false);
                $table->boolean('agreed_liability')->default(false);
                $table->integer('appointment_number')->unique()->nullable(); // Unique and nullable appointment number

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
