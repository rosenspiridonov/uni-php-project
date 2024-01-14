<?php

namespace App\Models\Course;

use App\Models\Organization\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";
    
    protected $fillable = [ 
        "name",
        "date",
        "duration",
        "price",
        "teacher",
        "image",
        "organization_id",
        "place_id"
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public $timestamps = true;
}
