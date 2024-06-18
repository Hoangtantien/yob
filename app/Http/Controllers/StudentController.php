<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Exception;

class StudentController extends Controller
{
    //

    public function showCreate()
    {
        return view('admin.students.create');
    }
    public function showUpdate($id)
    {

        $student = Student::findOrFail($id);
        $data['student'] = $student;
        return view('admin.students.update', $data);
    }
    public function createStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'email' => 'nullable|email|max:255', // Optional field
                'address' => 'required|string|max:255',
                'fee' => 'required|numeric',
            ]);

            // Create a new student record in the database
            $student = new Student();
            $student->name = $request->name;
            $student->phone = $request->phone;
            $student->email = $request->email; // Optional field
            $student->address = $request->address;
            $student->fee = $request->fee;
            $student->save();

            return redirect()->route('students.list')->with('success', 'Thêm học sinh thành công.');
        } catch (\Exception $e) {
            // Set an error message in the session
            return back()->with('error', 'Có lỗi xảy ra trong quá trình xử lí thông tin, vui lòng nhập lại');
        }
    }
    public function updateStore(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'email' => 'nullable|email|max:255', 
                'address' => 'required|string|max:255',
                'fee' => 'required|numeric',
            ]);

            // Create a new student record in the database
            $student = Student::findOrFail($id);
            $student->name = $request->name;
            $student->phone = $request->phone;
            $student->email = $request->email; 
            $student->address = $request->address;
            $student->fee = $request->fee;
            $student->save();

            return redirect()->route('students.list')->with('success', 'Chỉnh sửa học sinh thành công.');
        } catch (\Exception $e) {
            // Set an error message in the session
            return back()->with('error', 'Có lỗi xảy ra trong quá trình xử lí thông tin, vui lòng nhập lại');
        }
    }
    public function showList(Request $request)
    {
        $search = $request->query('search');
        $students = Student::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->appends(['search' => $search]);
        $data['students'] = $students;
        $data['search'] = $search;
        return view('admin.students.list', $data);
    }
}
