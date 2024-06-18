<?php

namespace App\Http\Controllers;

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
            $user->password = Hash::make($request->password); // Hash the password            
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->type = $request->type;
            $user->base_salary = $request->base_salary;
            $user->dob = $request->dob; // Assuming you have a role field in your users table
            $user->save();

            // Redirect or respond as necessary
            return redirect()->route('user.list')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('User creation failed: ' . $e->getMessage());
            dd($e->getMessage());
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

            // Find the user
            $user = User::findOrFail($id);

            // Update the user's details
            $user->email = $request->email;
            $user->name = $request->name;
            $user->type = $request->type;
            $user->base_salary = $request->base_salary;
            $user->dob = $request->dob; // Assuming you have a role field in your users table
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();

            // Redirect with success message
            return redirect()->route('user.list')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('User update failed: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'There was an error updating the user. Please try again.');
        }
    }
    public function showList()
    {
        $users = User::paginate(6); // Fetch all users from the database

        return view('admin.user.list', compact('users'));
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
}
