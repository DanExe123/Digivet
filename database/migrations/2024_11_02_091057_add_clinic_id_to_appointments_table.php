<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClinicIdToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('clinic_id')->nullable()->after('id'); // Add the clinic_id column
            $table->foreign('clinic_id')->references('id')->on('users')->onDelete('set null'); // Set foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['clinic_id']); // Drop the foreign key constraint
            $table->dropColumn('clinic_id'); // Drop the clinic_id column
        });
    }
}
