<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectClass;
class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'address', 'fee'];
    public function classes()
    {
        return $this->belongsToMany(ProjectClass::class, 'student_class', 'student_id', 'class_id');
    }
}


