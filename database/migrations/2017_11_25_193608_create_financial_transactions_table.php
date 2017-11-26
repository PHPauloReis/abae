<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_transactions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->integer('chart_of_account_id')->unsigned();;
            $table->text('description')->nullable();
            $table->double('value');
            $table->date('transaction_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_account');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_transactions');
    }
}
