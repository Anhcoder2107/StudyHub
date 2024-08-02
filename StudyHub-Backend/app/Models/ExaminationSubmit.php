<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationSubmit extends Model
{
    use HasFactory;
    protected $table = 'examination_submit';
    protected $fillable = ['examination_id', 'user_id', 'submit_time', 'file_url', 'score'];

    public function examination()
    {
        return $this->belongsTo(Examination::class, 'examination_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
