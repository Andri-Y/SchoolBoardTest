<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
        //
        Schema::create('grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('value');
            $table->bigInteger('student_id')->nullable()->unsigned();
            $table->foreign('student_id')
                ->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
        Schema::dropIfExists('students');
    }
}
