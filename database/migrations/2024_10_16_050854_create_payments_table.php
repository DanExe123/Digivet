<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('clinicname'); // Name of the clinic
            $table->date('payment_date'); // Date of the payment
            $table->decimal('amount', 10, 2); // Payment amount
            $table->string('reference_number'); // Reference number
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
