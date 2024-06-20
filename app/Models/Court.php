<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;
    protected $table = 'courts';
    protected $fillable = [
        'name',
        'description',
        'open_time',
        'close_time',
        'type',
        'address',
    ];
    public function projectClasses()
    {
        return $this->hasMany(ProjectClass::class, 'court_id');
    }
    public function getType()
    {
        switch ($this->type) {
          
            case 1:
                return 'Sân trong nhà';
                break;
            case 2:
                return 'Sân ngoài trời';
                break;
            default:
                return 'Không xác định';
                break;
        }
    }
}
