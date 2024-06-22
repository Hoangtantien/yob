<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    //
    public function showCreate()
    {

        return view('admin.user.create');
    }
    public function createStore(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'type' => 'required|integer',
            ]);

            // Create the user
            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->type = $request->type;
            $user->base_salary = $request->base_salary;
            $user->start_working = $request->start_working;
            $user->end_working = $request->end_working;
            $user->dob = $request->dob;
            $user->avatar = $request->avatar;
            $user->save();

            // Redirect or respond as necessary
            return redirect()->route('user.list')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('User creation failed: ' . $e->getMessage());
            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error creating the user. Please try again.');
        }
    }
    public function showUpdate($id)
    {
        $user = User::findOrFail($id);
        $data['user'] = $user;
        return view('admin.user.update', $data);
    }
    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        $data['user'] = $user;
        return view('page.profile', $data);
    }
    public function updateStore(Request $request, $id)
    {
        try {
            // Validate the request
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $id,
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'type' => 'required|integer'
            ]);

            $user = User::findOrFail($id);
            $user->email = $request->email;
            $user->name = $request->name;
            $user->type = $request->type;
            $user->base_salary = $request->base_salary;
            $user->dob = $request->dob; 
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->start_working = $request->start_working;
            $user->avatar = $request->avatar;
            $user->end_working = $request->end_working;
            $user->save();
            if($request->profile == 1){
            return redirect()->back()->with('success', 'User updated successfully.');

            }
            // Redirect with success message
            return redirect()->route('user.list')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            // Log the error

            Log::error('User update failed: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'There was an error updating the user. Please try again.');
        }
    }
    public function showList(Request $request)
    {
        $search = $request->query('search');
        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->appends(['search' => $search]);

        $data['users'] = $users;
        $data['search'] = $search;

        return view('admin.user.list', $data);
    }
    public function delete(Request $request, $id)
    {
        // Tìm người dùng theo id
        $user = User::find($id);

        if ($user) {
            // Xóa người dùng
            $user->delete();

            // Thêm thông báo xóa thành công (tuỳ chọn)
            return redirect()->route('user.list')->with('success', 'Người dùng đã được xóa thành công.');
        }
        return redirect()->route('user.list')->with('error', 'Người dùng không tồn tại.');
    }

    public function showChangePasswordForm()
    {
        return view('auth.passwords.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Check if the current password matches
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác']);
        }

        // Update the password
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Đổi mật khẩu thành công');
    }
}
