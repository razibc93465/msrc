<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['deptId','semId','studentId','courseId','attendance','tutorial','midterm','final','publicationStatus'];
}
