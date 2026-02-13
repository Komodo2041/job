<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    public $table = "jobtypes";
    public $fillable = ["name"];
    
}
