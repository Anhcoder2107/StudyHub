<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    protected $table = 'student_class';
    protected $fillable = ['user_id', 'class_id', 'start_time', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function class()
    {
        return $this->belongsTo(StudyClass::class, 'class_id');
    }
}
