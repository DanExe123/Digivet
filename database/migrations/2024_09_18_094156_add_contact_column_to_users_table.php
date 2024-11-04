<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactColumnToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Check if the column doesn't exist before adding
            if (!Schema::hasColumn('users', 'contact')) {
                $table->string('contact', 15)->nullable(); // Add contact column as a string
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Check if the column exists before dropping
            if (Schema::hasColumn('users', 'contact')) {
                $table->dropColumn('contact'); // Drop column on rollback
            }
        });
    }
}
