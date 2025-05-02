<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryCourseFactory> */
    use HasFactory;

    protected $table = 'category_courses';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name', 'category_description'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}
