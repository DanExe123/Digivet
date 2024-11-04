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
        if (!Schema::hasTable('events')) {
            Schema::create('events', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for user
            $table->string('title'); // Event title
            $table->dateTime('start'); // Start date and time
            $table->dateTime('end'); // End date and time
            $table->string('status')->default('active'); // Event status with a default value
            $table->timestamps(); // Created and updated timestamps

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // User foreign key
            });
        }
     


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop user foreign key constraint
          
        });

        Schema::dropIfExists('events'); // Drop events table
    }
};


