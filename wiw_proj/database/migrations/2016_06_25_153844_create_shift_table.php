<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('shifts', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('manager_id')->unsigned();
        $table->foreign('manager_id')->references('id')->on('users');
        $table->integer('employee_id')->unsigned()->nullable();
        $table->foreign('employee_id')->references('id')->on('users');
        $table->float('break');
        $table->datetime('start_time');
        $table->datetime('end_time');
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
      Schema::drop('shifts');
    }
}
