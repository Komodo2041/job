<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public $table = "offer";
    public $fillable = ["title", "body", "location", "type_id"];
}
