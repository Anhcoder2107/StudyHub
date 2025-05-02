<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestream extends Model
{
    /** @use HasFactory<\Database\Factories\LivestreamFactory> */
    use HasFactory;

    protected $table = 'livestream';
    protected $primaryKey = 'id';
    protected $fillable = ['class_id', 'title', 'description', 'start_time', 'end_time', 'url', 'recording_url'];

    public function class()
    {
        return $this->belongsTo(StudyClass::class, 'class_id');
    }
}
