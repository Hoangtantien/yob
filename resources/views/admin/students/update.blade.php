@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('students.update.store', $student->id) }}" method="post" class="cs-form">
            @csrf
            <h5 class="text-center mb-3">
                Chỉnh sửa thông tin học sinh
            </h5>
            <div class="mb-3 row">
                <div class="col-12">
                    <label for="exampleInputEmail1" class="form-label">Tên học sinh <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Email <small>(tùy chọn)</small></label>
                    <input type="text" class="form-control" name="email" value="{{ $student->email }}">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Số điện thoại <span class="required">*</span></label>
                    <input type="text" class="form-control" name="phone" value="{{ $student->phone }}">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</small></label>
                    <input type="text" class="form-control" name="address" value="{{ $student->address }}">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Học phí <span class="required">*</span></label>
                    <input type="text" class="form-control" name="fee" value="{{ $student->fee }}">
                </div>
            </div>
            <div class="mb-3 btn-box">
                <button type="submit" class="btn btn-primary ">Lưu thông tin</button>
                <a href="{{ route('students.list') }}" class="btn btn-secondary ">Quay lại</a>
            </div>
        </form>
    </div>
@endsection
