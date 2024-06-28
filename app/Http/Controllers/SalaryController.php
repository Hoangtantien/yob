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
}
