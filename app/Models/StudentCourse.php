<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    /** @use HasFactory<\Database\Factories\StudentCourseFactory> */
    use HasFactory;

    protected $table = 'student_course';
    protected $fillable = ['user_id', 'course_id', 'start_time', 'progress'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
