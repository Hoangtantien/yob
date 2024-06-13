<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;
    protected $table = 'courts';
    protected $fillable = ['name'];
    public function projectClasses()
    {
        return $this->hasMany(ProjectClass::class, 'court_id');
    }
}
