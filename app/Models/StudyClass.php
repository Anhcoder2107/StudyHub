<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyClass extends Model
{
    /** @use HasFactory<\Database\Factories\StudyClassFactory> */
    use HasFactory;

    protected $table = 'class';
    protected $fillable = ['user_id', 'name', 'description', 'start_time', 'end_time', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->hasMany(StudentClass::class, 'class_id');
    }

    public function lessons()
    {
        return $this->hasMany(ClassLesson::class, 'class_id');
    }

    public function livestreams()
    {
        return $this->hasMany(Livestream::class, 'class_id');
    }
}
