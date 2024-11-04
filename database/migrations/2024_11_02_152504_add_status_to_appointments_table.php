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
        // Check if the 'status' column does not exist before adding it
        if (!Schema::hasColumn('appointments', 'status')) {
            Schema::table('appointments', function (Blueprint $table) {
                $table->string('status')->default('active')->after('appointment_number'); // Adjust the position as necessary
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('status'); // Drop the status column if rolling back
        });
    }
};
