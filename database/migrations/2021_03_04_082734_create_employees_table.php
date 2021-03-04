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
            $table->string('name');
            $table
                ->foreignId('position_id')
                ->nullable()
                ->constrained('positions')
                ->onDelete('set null');
            $table->date('employment_date');
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->float('salary');
            $table->string('photo');
            $table->nestedSet();
            $table->userstamps();
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
        Schema::dropIfExists('employees');
    }
}
