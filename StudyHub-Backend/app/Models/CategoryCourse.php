<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    use HasFactory;
    protected $table = 'category_course';
    protected $fillable = ['category_name', 'category_description'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}
