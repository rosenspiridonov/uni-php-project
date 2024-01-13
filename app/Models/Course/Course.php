<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";
    
    protected $fillable = [ 
        "name",
        "date",
        "time",
        "teacher_id",
        "organization_id",
        "place_id"
    ];

    public $timestamps = true;
}
