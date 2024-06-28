<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ProjectClass;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function classes()
    {
        return $this->belongsToMany(ProjectClass::class, 'coach_class', 'coach_id', 'class_id');
    }

    public function getType()
    {
        switch ($this->type) {

            case 0:
                return 'Quản trị viên';
                break;
            case 1:
                return 'Giám đốc';
                break;
            case 2:
                return 'Huấn luyện viên';
                break;
            default:
                return 'Không xác định';
                break;
        }
    }

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'achievement_user')
            ->withPivot('date_achieved')
            ->withTimestamps();
    }
    public function timelogs()
    {
        return $this->hasMany(Timelog::class);
    }
}
