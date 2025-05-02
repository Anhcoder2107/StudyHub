<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassLesson extends Model
{
    /** @use HasFactory<\Database\Factories\ClassLessonFactory> */
    use HasFactory;

    protected $table = 'class_lesson';
    protected $primaryKey = 'id';
    protected $fillable = ['class_id', 'video_id', 'title', 'description', 'order_lesson', 'resource_links', 'status'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function class()
    {
        return $this->belongsTo(StudyClass::class, 'class_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }


}
