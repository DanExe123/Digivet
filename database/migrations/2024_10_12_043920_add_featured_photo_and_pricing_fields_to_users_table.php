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
    Schema::table('users', function (Blueprint $table) {
        $table->string('featured_photo')->nullable();
        $table->decimal('pricing_deworming', 8, 2)->nullable();
        $table->decimal('pricing_vaccinated', 8, 2)->nullable();
        $table->decimal('pricing_consultation', 8, 2)->nullable();
        $table->decimal('pricing_petgrooming', 8, 2)->nullable();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['featured_photo', 'pricing_deworming', 'pricing_vaccinated', 'pricing_consultation', 'pricing_petgrooming']);
    });
}

};
