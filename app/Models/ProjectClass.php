<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectClass extends Model
{
    use HasFactory;
    protected $table = 'project_classes';
    protected $fillable = ['id','name'];
    public function court()
    {
        return $this->belongsTo(Court::class, 'court_id');
    }
}
