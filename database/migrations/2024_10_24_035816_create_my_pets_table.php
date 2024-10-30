<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('my_pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->string('name');
            $table->string('breed')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('birthdate')->nullable();
            $table->string('color')->nullable();
            $table->string('fur_type')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();   

              // Add foreign key for users
        //    $table->unsignedBigInteger('user_id');  // Foreign key for users table
          // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
               
        
        Schema::table('my_pets', function (Blueprint $table) {
            // You may need to define the previous type here
            $table->string('gender')->nullable()->change();
        });
        
    }
};