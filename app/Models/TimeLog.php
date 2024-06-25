<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    use HasFactory;

    protected $table = 'time_logs';
    protected $fillable = [
        'user_id',
        'short_session_id',
        'class_id',
        'date',
    ];

    public function projectClass()
    {
        return $this->belongsTo(ProjectClass::class, 'class_id');
    }
}
