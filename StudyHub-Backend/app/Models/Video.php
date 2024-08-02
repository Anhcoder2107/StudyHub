<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $fillable = ['title', 'description', 'url', 'duration'];

    public function classLessons()
    {
        return $this->hasMany(ClassLesson::class, 'video_id');
    }

    public function courseLessons()
    {
        return $this->hasMany(LessonCourse::class, 'video_id');
    }
}
