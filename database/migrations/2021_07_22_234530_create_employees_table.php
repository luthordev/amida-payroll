<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->string('name');
            $table->enum('bank', ['BRI', 'MANDIRI', 'BCA', 'BNI', 'BTN', 'DANAMON', 'PERMATA', 'MAYBANK', 'CIMB NIAGA', 'OCBC NISP']);
            $table->string('no_bank_account');
            $table->bigInteger('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->bigInteger('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
