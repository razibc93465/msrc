<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['deptId','notificationTitle','notificationDescription','nImage','publicationStatus'];

    
}
