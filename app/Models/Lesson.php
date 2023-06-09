<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $primaryKey = "lesson_id";

    protected $fillable = [
        'name',
        'price'
    ];

    public function courses() {
        return $this->belongsToMany(Course::class,'course_lessons','course_id','lesson_id');
    }
}
