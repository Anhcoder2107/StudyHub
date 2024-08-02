<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $table = 'exercise';
    protected $fillable = ['user_id', 'title', 'description', 'due_date', 'max_score'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function submits()
    {
        return $this->hasMany(ExerciseSubmit::class, 'exercise_id');
    }
}
