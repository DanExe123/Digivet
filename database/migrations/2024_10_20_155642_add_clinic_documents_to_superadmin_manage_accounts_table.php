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
        Schema::table('superadmin_manage_accounts', function (Blueprint $table) {
            $table->json('clinic_documents')->nullable(); // You can change the type and constraints as per your requirements
        });
    }
    
    public function down()
    {
        Schema::table('superadmin_manage_accounts', function (Blueprint $table) {
            $table->dropColumn('clinic_documents');
        });
    }
    
};
