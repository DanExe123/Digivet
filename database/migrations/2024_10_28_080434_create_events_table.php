<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for user
            $table->string('title'); // Event title
            $table->dateTime('start'); // Start date and time
            $table->dateTime('end'); // End date and time
            $table->string('status'); // Event status
            $table->timestamps(); // Created and updated timestamps

            // Foreign key constraint
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
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key constraint
        });

        Schema::dropIfExists('events'); // Drop events table
    }
}
