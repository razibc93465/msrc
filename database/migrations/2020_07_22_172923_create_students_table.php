<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('deptId');
            $table->integer('sExamRoll');
            $table->text('sRegNo');
            $table->string('sName');    
            $table->text('sAddress');
            $table->text('sImage');
            $table->string('sEmail', 100)->unique();           
            $table->tinyInteger('publicationStatus'); 
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
        Schema::dropIfExists('students');
    }
}
