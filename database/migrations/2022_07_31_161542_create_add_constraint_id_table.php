<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddConstraintIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('id_people');

            $table->foreign('id_people')->references('id')
            ->on('people')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
            //
        });
    }
}
