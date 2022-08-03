<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->integer("taxes");
            $table->integer("home_mortgage_payment");
            $table->integer("School_loan_payment");
            $table->integer("car_loan_payment");
            $table->integer("credit_card_payment");
            $table->integer("other_expenses");
            $table->integer("bank_loan_payment");
            $table->integer("per_child_expense");
            $table->integer("children");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
