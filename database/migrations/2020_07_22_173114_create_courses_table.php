<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();            
            $table->integer('deptId');  
            $table->integer('tId');  
            $table->integer('semId');  
            $table->text('courseCode'); 
            $table->string('courseTitle');
            $table->integer('courseCredit'); 
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
        Schema::dropIfExists('courses');
    }
}
