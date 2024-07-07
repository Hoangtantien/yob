<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    //
    public function showCreate()
    {
        $users = User::where('type', 2)->get();
        $data['users'] = $users;
        return view('admin.achievement.create', $data);
    }
    public function createStore(Request $request)
    {
        try {
            $achievement = new Achievement();
            $achievement->name = $request->name;
            $achievement->description = $request->description;
            $achievement->raise_salary = $request->raise_salary;
            $achievement->save();

            $userData = [];
            $raiseSalary = $request->raise_salary;

            foreach ($request->user_ids as $index => $userId) {
                if (isset($request->date_achieved[$index]) && !empty($request->date_achieved[$index])) {
                    $userData[$userId] = ['date_achieved' => $request->date_achieved[$index]];

                    if ($raiseSalary == 1) {
                        $user = User::find($userId);
                        if ($user) {
                            $user->base_salary += 50000; 
                            $user->save();
                        }
                    }
                }
            }

            $achievement->users()->sync($userData);

            return redirect()->route('achievement.list')->with('success', 'Achievement created successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error creating the achievement. Please try again.');
        }
    }

    public function showList(Request $request)
    {
        $search = $request->query('search');
        $achievements = Achievement::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->appends(['search' => $search]);

        $data['achievements'] = $achievements;
        $data['search'] = $search;

        return view('admin.achievement.list', $data);
    }
    public function showDetail($id)
    {
        $achievement = Achievement::findOrFail($id);
        $data['users'] = $achievement->users;
        return view('admin.achievement.list-modal', $data);
    }
    public function showUpdate($id)
    {
        $achievement = Achievement::findOrFail($id);
        $users = User::where('type', 2)->get();
        $achievementUsers = $achievement->users()->withPivot('date_achieved')->get();
        $data['achievementUsers'] = $achievementUsers;

        $data['users'] = $users;
        $data['achievement'] = $achievement;
        return view('admin.achievement.update', $data);
    }
    public function updateStore(Request $request, $id)
{
    try {
        $achievement = Achievement::findOrFail($id);
        $achievement->name = $request->name;
        $achievement->description = $request->description;
        $achievement->save();

        $userData = [];
        $raiseSalary = $request->raise_salary; 
        
        // Lấy danh sách người dùng hiện tại liên kết với thành tích trước khi cập nhật
        $currentUsers = $achievement->users->pluck('id')->toArray();
        
        foreach ($request->user_ids as $index => $userId) {
            if (isset($request->date_achieved[$index]) && !empty($request->date_achieved[$index])) {
                $userData[$userId] = ['date_achieved' => $request->date_achieved[$index]];
                
                // Nếu raise_salary = 1, tăng lương cho nhân viên mới được thêm
                if ($raiseSalary == 1 && !in_array($userId, $currentUsers)) {
                    $user = User::find($userId);
                    if ($user) {
                        $user->base_salary += 50000; 
                        $user->save();
                    }
                }
            }
        }

        // Đồng bộ người dùng mới với thành tích
        $achievement->users()->sync($userData);

        return redirect()->route('achievement.list')->with('success', 'Achievement updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'There was an error updating the achievement. Please try again.');
    }
}

    
    public function delete($id)
    {
        try {
            $achievement = Achievement::findOrFail($id);
            // $users = $achievement->users;

            // foreach ($users as $user) {
            //     $user->base_salary -= 50000;
            //     $user->save();
            // }

            $achievement->users()->detach();
            $achievement->delete();

            return redirect()->route('achievement.list')->with('success', 'Thành tích đã được xóa thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xử lí hệ thống.');
        }
    }
    public function getUserAchievement($id)
    {
        $user = User::with('achievements')->findOrFail($id);

        $achievements = $user->achievements()->paginate(5);

        return view('page.achievements', compact('user', 'achievements'));
    }
}
