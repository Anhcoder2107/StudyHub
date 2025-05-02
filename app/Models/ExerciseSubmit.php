<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseSubmit extends Model
{
    /** @use HasFactory<\Database\Factories\ExerciseSubmitFactory> */
    use HasFactory;

    protected $table = 'exercise_submits';
    protected $fillable = ['exercise_id', 'user_id', 'submit_time', 'file_url'];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
