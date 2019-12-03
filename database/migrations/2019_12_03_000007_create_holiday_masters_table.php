<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayMastersTable extends Migration
{
    public function up()
    {
        Schema::create('holiday_masters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('reason');

            $table->date('holiday_date');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
