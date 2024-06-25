<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortSession;
use App\Models\ProjectClass;
use Illuminate\Support\Carbon;
use App\Models\TimeLog;

class TimeLogController extends Controller
{
    //
    public function getCheckIn(Request $request)
    {
        $short_session = ShortSession::all();
        $query = ProjectClass::query();
        $user = auth()->user();
        if ($user->type == 2) {
            $query->whereHas('coaches', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            });
        }
        $classes = $query->orderBy('created_at', 'desc')->get();

        $currentDate = now()->timezone('Asia/Ho_Chi_Minh');
        // $currentDate = now()->startOfMonth()->month(5)->year(2024)->timezone('Asia/Ho_Chi_Minh');

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentDate->month, $currentDate->year);
        $allDaysInMonth = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::createFromDate($currentDate->year, $currentDate->month, $day);
            $date->locale('vi');
            $allDaysInMonth[] = [
                'day' => $day,
                'month' => $currentDate->month,
                'weekday' => $this->translateDay($date->format('D')),
                'weekday_vi' => $date->format('l'),
                'date' => $date->toDateString(),
            ];
        }

        $timelogs = Timelog::where('user_id', $user->id)
            ->whereMonth('date', $currentDate->month)
            ->whereYear('date', $currentDate->year)
            ->get();
        $totalTimelogs = $timelogs->count();
        $data['short_session'] = $short_session;
        $data['classes'] = $classes;
        $data['days'] = $allDaysInMonth;
        $data['currentMonth'] = $this->translateMonth($currentDate->month);
        $data['currentYear'] = $currentDate->year;
        $data['timelogs'] = $timelogs;
        $data['totalTimelogs'] = $totalTimelogs;
        return view('page.timelogs.check-in', $data);
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
    public static function translateDay($englishDay)
    {
        $translations = [
            'Mon' => 'Thứ hai',
            'Tue' => 'Thứ ba',
            'Wed' => 'Thứ tư',
            'Thu' => 'Thứ năm',
            'Fri' => 'Thứ sáu',
            'Sat' => 'Thứ bảy',
            'Sun' => 'Chủ nhật',
        ];

        return $translations[$englishDay] ?? $englishDay;
    }

    public function storeCheckin(Request $request)
    {
        try {
            $request->validate([
                'class_id' => 'required|integer',
                'short_session_id' => 'required|integer',
            ]);

            $user = auth()->user();
            if (!$user) {
                return redirect()->back()->with('error', 'Unauthorized');
            }

            $shortSession = ShortSession::findOrFail($request->short_session_id);

            $currentDateTime = now()->setTimezone('Asia/Ho_Chi_Minh');

            $startTime = \Carbon\Carbon::parse($shortSession->start_time, 'Asia/Ho_Chi_Minh')->subMinutes(15);
            $endTime = \Carbon\Carbon::parse($shortSession->end_time, 'Asia/Ho_Chi_Minh');

            // fake data
            // $currentDateTime = \Carbon\Carbon::create(2024, 5, 1, 19, 0, 0, 'Asia/Ho_Chi_Minh');
            // $startTime = \Carbon\Carbon::parse($currentDateTime->format('Y-m-d') . ' ' . $shortSession->start_time, 'Asia/Ho_Chi_Minh')->subMinutes(15);
            // $endTime = \Carbon\Carbon::parse($currentDateTime->format('Y-m-d') . ' ' . $shortSession->end_time, 'Asia/Ho_Chi_Minh');
            // fake data


            $todayDate = $currentDateTime->toDateString();

            $existingCheckin = TimeLog::where('user_id', $user->id)
                ->where('short_session_id', $request->short_session_id)
                ->where('date', $todayDate)
                ->first();

            if ($existingCheckin) {
                return redirect()->back()->with('error', 'Bạn đã đăng ký cho ca học này hôm nay');
            }
            // Check if current time is between start time and end time
            if ($currentDateTime->between($startTime, $endTime)) {
                TimeLog::create([
                    'user_id' => $user->id,
                    'short_session_id' => $request->short_session_id,
                    'class_id' => $request->class_id,
                    'date' => $todayDate,
                ]);

                return redirect()->back()->with('success', 'Đăng ký ca dạy thành công');
            } else {
                return redirect()->back()->with('error', 'Thời điểm hiện tại không trùng với ca đăng ký');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Session not found');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi hệ thống');
        }
    }
}
