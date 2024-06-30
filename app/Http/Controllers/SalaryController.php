<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Salary;
use App\Models\TimeLog;
use App\Models\User;

class SalaryController extends Controller
{
    //
    public function create()
    {
        return view('page.salary.create');
    }



    public function store(Request $request)
    {
        $selectedMonth = $request->input('selected_month');
        $selectedYear = $request->input('selected_year');
        // Get users who have timelogs in the selected month and year
        $users = User::whereHas('timelogs', function ($query) use ($selectedMonth, $selectedYear) {
            $query->whereMonth('date', $selectedMonth)->whereYear('date', $selectedYear);
        })->get();

        foreach ($users as $user) {
            // Check if salary already exists for the user in the selected month and year
            $existingSalary = Salary::where('user_id', $user->id)
                ->where('month', $selectedMonth)
                ->where('year', $selectedYear)
                ->first();

            if ($existingSalary) {
                // Skip this user if salary already exists
                continue;
            }

            $totalSessions = Timelog::where('user_id', $user->id)
                ->whereMonth('date', $selectedMonth)
                ->whereYear('date', $selectedYear)
                ->count();

            $calculatedSalary = $totalSessions * $user->base_salary;

            Salary::create([
                'user_id' => $user->id,
                'title' => $request->input('title'),
                'month' => $selectedMonth,
                'year' => $selectedYear,
                'total_session' => $totalSessions,
                'user_base_salary' => $user->base_salary,
                'calculated_salary' => $calculatedSalary,
                'created_by' => Auth::id(),
            ]);
        }

        return redirect()->back()->with('success', 'Salaries have been generated successfully.');
    }

    public function statistic(Request $request){
        
        $currentYear = $request->get('selected_year') ? $request->get('selected_year') : date('Y');
        $months = [];
        $users = User::where('type',2)->get();
        $selectedMonth = $request->input('selected_month', null);
        $startMonth = $selectedMonth ?: 1;
        $endMonth = $selectedMonth ?: 12;
        $months = [];
        for ($i = $startMonth; $i <= $endMonth; $i++) {
            $months[] = [
                'number' => $i,
                'name' => $this->translateMonth($i),
                'year' => $currentYear,
            ];
        }
        $data['months'] = $months;
        $data['users'] = $users;
        $data['year'] = $currentYear;
        return view('page.salary.statistic',$data);
    }


    public static function translateMonth($englishMonth)
    {
        $translations = [
            '1' => 'Tháng một',
            '2' => 'Tháng hai',
            '3' => 'Tháng ba',
            '4' => 'Tháng tư',
            '5' => 'Tháng năm',
            '6' => 'Tháng sáu',
            '7' => 'Tháng bảy',
            '8' => 'Tháng tám',
            '9' => 'Tháng chín',
            '10' => 'Tháng mười',
            '11' => 'Tháng mười một',
            '12' => 'Tháng mười hai',
        ];

        return $translations[$englishMonth] ?? $englishMonth;
    }
}
