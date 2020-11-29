<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['deptId','tId','semId','courseCode','courseTitle','courseCredit','publicationStatus'];
}
