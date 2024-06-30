<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'month',
        'year',
        'total_session',
        'user_base_salary',
        'calculated_salary',
        'created_by',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function hasSalaryRecords($userId, $month = null, $year = null)
    {
        $query = self::where('user_id', $userId);

        if ($month !== null) {
            $query->where('month', $month);
        }

        if ($year !== null) {
            $query->where('year', $year);
        }

        return $query->exists();
    }
    public static function getSalaryByUserId($userId, $month = null, $year = null, $perPage = null)
    {


        $query = self::where('user_id', $userId);
        $query->orderBy("id", "DESC");
        if ($month !== null) {
            $query->where('month', $month);
        }

        if ($year !== null) {
            $query->where('year', $year);
        }
        if ($perPage) {

            return $query->paginate($perPage);
        } else {
            return $query->get();
        }
    }
}
