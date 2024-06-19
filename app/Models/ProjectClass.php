<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CoachClass;
use App\Models\StudentClass;
use App\Models\Student;
class ProjectClass extends Model
{
    use HasFactory;
    protected $table = 'project_classes';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'court_id',
    ];
    public function court()
    {
        return $this->belongsTo(Court::class, 'court_id');
    }
    public function coaches()
    {
        return $this->belongsToMany(User::class, 'coach_class', 'class_id', 'coach_id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_class', 'class_id', 'student_id');
    }
}
