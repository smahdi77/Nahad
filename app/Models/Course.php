<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = "course_id";

    public $timestamps = false;

    protected $fillable = [
        'name',
        'price'
    ];

    // many to many relationship with lesson
    public function lessons() {
        return $this->belongsToMany(Lesson::class,'course_lessons','course_id','lesson_id');
    }

}
