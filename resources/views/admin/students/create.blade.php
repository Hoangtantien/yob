@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('students.create.store') }}" method="post" class="cs-form">
            @csrf
            <h5 class="text-center mb-3">
                Thêm học sinh
            </h5>
            <div class="mb-3 row">
                <div class="col-12">
                    <label for="exampleInputEmail1" class="form-label">Tên học sinh <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Email<small>(tùy chọn)</small></label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Số điện thoại <span class="required">*</span></label>
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Địa chỉ <span class="required">*</span></label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Học phí <span class="required">*</span></label>
                    <input type="text" class="form-control" name="fee">
                </div>
            </div>
            <div class="mb-3 btn-box">
                <a href="{{ route('students.list') }}" class="btn btn-secondary ">Quay lại</a>
                <button type="submit" class="btn btn-primary ">Thêm học sinh</button>
            </div>
        </form>
    </div>
@endsection
