<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = "course_id";

    protected $fillable = [
        'name',
        'price'
    ];

    public function lessons() {
        return $this->belongsToMany(Course::class,'course_lessons','lesson_id','course_id');
    }

}
