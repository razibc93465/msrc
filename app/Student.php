<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['deptId','sExamRoll','sRegNo','sName','sAddress','sImage','sEmail','publicationStatus'];
}
