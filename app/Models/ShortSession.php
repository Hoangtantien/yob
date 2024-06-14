<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortSession extends Model
{
    use HasFactory;
    protected $table = 'short_session';
    protected $fillable = ['name', 'start_time', 'end_time'];
}
