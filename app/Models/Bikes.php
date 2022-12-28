<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bikes extends Model
{
    use HasFactory;
    protected $table = "bikes";
    protected $primarykey = "bike_id";
}
