<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('active', ['Y', 'N'])->default('Y');
            $table->string('code', 50)->unique();
            $table->string('name', 255);
            $table->date('date_of_birth');
            $table->enum('gender', ['m', 'f']);
            $table->string('mothers_name', 255);
            $table->string('fathers_name', 255);
            $table->string('address', 255);
            $table->string('district', 100);
            $table->char('zipcode', 9);
            $table->char('phone', 15);
            $table->char('main_mobile', 15);
            $table->char('secondary_mobile', 15);
            $table->string('email');
            $table->longText('diagnosis');
            $table->enum('practice_day', [1, 2, 3, 4, 5, 6]);
            $table->enum('activity_location', [1, 2]);
            $table->double('contribution_value', 10, 2);
            $table->string('indicated_by', 255);
            $table->string('social_worker', 255);
            $table->date('discharge_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
