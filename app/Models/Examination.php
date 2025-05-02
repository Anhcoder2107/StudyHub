<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    /** @use HasFactory<\Database\Factories\ExaminationFactory> */
    use HasFactory;

    protected $table = 'examination';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'title', 'description', 'start_time', 'end_time', 'duration', 'max_score'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function submits()
    {
        return $this->hasMany(ExaminationSubmit::class, 'examination_id');
    }
}
