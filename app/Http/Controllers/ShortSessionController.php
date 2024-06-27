<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortSession;

class ShortSessionController extends Controller
{
    //
    public function showCreate()
    {
        return view('admin.short_session.create');
    }
    public function createStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'start_time' => 'required', // or 'H:i' if you're not including seconds
                'end_time' => 'required',   // or 'H:i' if you're not including seconds
            ]);
            $short_session = new ShortSession();
            $short_session->name = $request->name;
            $short_session->start_time = $request->start_time;
            $short_session->end_time = $request->end_time;
            $short_session->save();
            session()->flash('success',  'Thêm thời gian ca học thành công');
            return redirect()->route('short-session.list');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi trong quá trình xử lí thông tin');
            return back();
        }
    }
    public function showList(Request $request)
    {
        $search = $request->query('search');
        $short_sessions = ShortSession::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->appends(['search' => $search]);
        $data['short_sessions'] = $short_sessions;
        $data['search'] = $search;
        return view('admin.short_session.list', $data);
    }
    public function showUpdate($id)
    {
        $short_session = ShortSession::findOrFail($id);
        $data['short_session'] = $short_session;
        return view('admin.short_session.update', $data);
    }
    public function updateStore(Request $request, $id)
    {
        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'start_time' => 'required', // or 'H:i' if you're not including seconds
                'end_time' => 'required',   // or 'H:i' if you're not including seconds
            ]);
            $short_session = ShortSession::findOrFail($id);
            $short_session->name = $request->name;
            $short_session->start_time = $request->start_time;
            $short_session->end_time = $request->end_time;
            $short_session->save();
            session()->flash('success',  'Cập nhật thời gian ca học thành công');
            return redirect()->route('short-session.list');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi trong quá trình xử lí thông tin');
            return back();
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            // Tìm người dùng theo id
            $short_session = ShortSession::find($id);

            if ($short_session) {
                // Xóa người dùng
                $short_session->delete();

                
            }
            session()->flash('success',  'Xóa thời gian ca học thành công');
            return redirect()->route('short-session.list');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi trong quá trình xử lí thông tin');
            return back();
        }
    }
}
