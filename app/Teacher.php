<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
   protected $fillable = ['deptId','tName','tAddress','tImage','tEmail','tPassword','publicationStatus'];
}
