<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectClass;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Student;
use App\Models\User;
use App\Models\Court;

class ClassController extends Controller
{
    public function showCreate()
    {
        $students = Student::all();
        $coachs = User::where('type', 2)->get();
        $courts = Court::all();
        $data['students'] = $students;
        $data['courts'] = $courts;
        $data['coachs'] = $coachs;
        return view('admin.class.create', $data);
    }
    public function createStore(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string',
            ]);
            // Create the user
            $class = new ProjectClass();
            $class->name = $request->name;
            $class->description = $request->description;
            $class->start_date = $request->start_date;
            $class->end_date = $request->end_date;
            $class->court_id = $request->court_id;
            $class->save();

            // Attach coaches to the class
            $class->coaches()->sync($request->coach_ids);

            // Attach students to the class
            $class->students()->sync($request->student_ids);
            // Redirect or respond as necessary
            return redirect()->route('class.list')->with('success', 'Class created successfully.');
        } catch (\Exception $e) {
            // Log the error
            dd($e->getMessage());
            Log::error('Class creation failed: ' . $e->getMessage());
            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error creating the user. Please try again.');
        }
    }
    public function showList()
    {
        $classes = ProjectClass::all(); // Fetch all users from the database

        return view('admin.class.list', compact('classes'));
    }
    public function delete(Request $request, $id)
    {
        // Tìm người dùng theo id
        $class = ProjectClass::find($id);

        if ($class) {
            // Xóa người dùng
            $class->delete();

            // Thêm thông báo xóa thành công (tuỳ chọn)
            return redirect()->route('class.list')->with('success', 'lớp học này đã được xóa thành công.');
        }

        return redirect()->route('class.list')->with('error', 'Lớp học này không tồn tại.');
    }
    public function showUpdate($id)
    {
        $class = ProjectCLass::findOrFail($id);
        $data['class'] = $class;
        $students = Student::all();
        $coachs = User::where('type', 2)->get();
        $courts = Court::all();
        $data['students'] = $students;
        $data['courts'] = $courts;
        $data['coachs'] = $coachs;
        return view('admin.class.update', $data);
    }
    public function updateStore(Request $request, $id)
    {
        try {
            // Validate the request with custom messages
            $request->validate([
                'name' => 'required|string',
                'amount' => 'required|integer|max:20' // Sử dụng 'max' để giới hạn giá trị tối đa là 20
            ], [
                'amount.max' => 'Số lượng không được quá 20' // Thông báo lỗi tùy chỉnh
            ]);

            // Find the class by ID
            $class = ProjectClass::findOrFail($id);

            // Update the class's details
            $class->name = $request->name;
            $class->amount = $request->amount;
            $class->save();

            // Redirect with success message
            return redirect()->route('class.list')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Class update failed: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Số lượng lớp học không được vượt quá 20.');
        }
    }
}
