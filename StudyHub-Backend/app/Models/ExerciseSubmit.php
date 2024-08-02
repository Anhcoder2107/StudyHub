<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseSubmit extends Model
{
    use HasFactory;
    protected $table = 'exercise_submit';
    protected $fillable = ['exercise_id', 'user_id', 'submit_time', 'file_url'];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
