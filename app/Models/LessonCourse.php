<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonCourse extends Model
{
    /** @use HasFactory<\Database\Factories\LessonCourseFactory> */
    use HasFactory;

    protected $table = 'lesson_courses';
    protected $fillable = ['course_id', 'video_id', 'title', 'description', 'order_lesson', 'resource_links', 'status'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
}
