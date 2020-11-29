<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();            
            $table->integer('deptId');             
            $table->integer('semId');  
            $table->integer('studentId');             
            $table->integer('courseId');               
            $table->integer('attendance'); 
            $table->integer('tutorial'); 
            $table->integer('midterm'); 
            $table->integer('final');            
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
        Schema::dropIfExists('results');
    }
}
