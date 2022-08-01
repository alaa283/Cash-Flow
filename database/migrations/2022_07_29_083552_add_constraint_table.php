<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('realestates', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('id_expenses');

            $table->foreign('id_expenses')->references('id')
            ->on('expenses')
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
        Schema::table('realestates', function (Blueprint $table) {
            //
        });
    }
}
