<?php

namespace App\Http\Controllers;
use Shuchkin\SimpleXLSXGen;
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

    public function statistic(Request $request)
    {

        $currentYear = $request->get('selected_year') ? $request->get('selected_year') : date('Y');
        $months = [];
        $users = User::where('type', 2)->get();
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
        return view('page.salary.statistic', $data);
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

    public function userList(Request $request, $id)
    {
        $perPage = $request->input('per_page', 5);
        $salaries = Salary::getSalaryByUserId($id, null, null, $perPage);
        $vietnameseMonths = [
            1 => 'Tháng 1',
            2 => 'Tháng 2',
            3 => 'Tháng 3',
            4 => 'Tháng 4',
            5 => 'Tháng 5',
            6 => 'Tháng 6',
            7 => 'Tháng 7',
            8 => 'Tháng 8',
            9 => 'Tháng 9',
            10 => 'Tháng 10',
            11 => 'Tháng 11',
            12 => 'Tháng 12',
        ];
        return view('page.salary.user-list', [
            'salaries' => $salaries,
            'vietnameseMonths' => $vietnameseMonths,
        ]);
    }


    public function exportStatisticToExcelAjax(Request $request)
    {
        $currentYear = $request->post('selected_year') ? $request->post('selected_year') : date('Y');
        $selectedMonth = $request->post('selected_month', null);
        $startMonth = $selectedMonth ?: 1;
        $endMonth = $selectedMonth ?: 12;
        $months = [];
        $users = User::where('type', 2)->get();
        for ($i = $startMonth; $i <= $endMonth; $i++) {
            $months[] = [
                'number' => $i,
                'name' => $this->translateMonth($i),
                'year' => $currentYear,
            ];
        }

        $header = ['Huấn luyện viên/Tháng'];
        foreach ($months as $month) {
            $header[] = $month['name'];
        }
        $data = [];
        $data[] = $header;

        foreach ($users as $user) {
            $row = [$user->name];
            foreach ($months as $month) {
                $has_salary = Salary::hasSalaryRecords($user->id, $month['number'], $month['year']);
                if ($has_salary) {
                    $salary = Salary::getSalaryByUserId($user->id, $month['number'], $month['year'], null);
                    if ($salary->isNotEmpty()) {
                        $salary_number = $salary[0]->calculated_salary;
                        $salary_format = number_format($salary_number, 0, ',', '.');
                        $row[] = $salary_format;
                    } else {
                        $row[] = 0;
                    }
                } else {
                    $row[] = 0;
                }
            }
            $data[] = $row;
        }

        // Sử dụng SimpleXLSXGen để tạo và lưu file Excel
        $xlsx = SimpleXLSXGen::fromArray($data);
        $filePath = 'exports/Thong_ke_luong_' . $currentYear . '.xlsx';
        $xlsx->saveAs(storage_path('app/public/' . $filePath));

        $url = asset('storage/' . $filePath);

        return response()->json(['url' => $url]);
    }
}
