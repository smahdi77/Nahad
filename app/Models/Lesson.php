<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $primaryKey = "lesson_id";

    public $timestamps = false;

    protected $fillable = [
        'name',
        'price'
    ];

    // many to many relationship with course
    public function courses() {
        return $this->belongsToMany(Course::class,'course_lessons','lesson_id','course_id');
    }
}
