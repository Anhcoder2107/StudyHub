<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;


    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'user_id', 'course_name', 'course_description', 'image', 'status'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryCourse::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lessons()
    {
        return $this->hasMany(StudentCourse::class, 'course_id');
    }

    public function students()
    {
        return $this->hasMany(StudentCourse::class, 'course_id');
    }



}
