<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadgeEmployeePivotTable extends Migration
{
    public function up()
    {
        Schema::create('badge_employee', function (Blueprint $table) {
            $table->unsignedInteger('employee_id');

            $table->foreign('employee_id', 'employee_id_fk_935947')->references('id')->on('employees')->onDelete('cascade');

            $table->unsignedInteger('badge_id');

            $table->foreign('badge_id', 'badge_id_fk_935947')->references('id')->on('badges')->onDelete('cascade');
        });
    }
}
