<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashSafesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_safes', function (Blueprint $table) {
            $table->id();
            $table->double('wages', 16, 2)->nullable();
            $table->decimal('purchases', 16, 2)->nullable();
            $table->decimal('sales', 16, 2)->nullable();
            $table->integer('pettycash')->nullable();  
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
        Schema::dropIfExists('cash_safes');
    }
}
