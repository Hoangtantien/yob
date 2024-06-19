@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('class.create.store') }}" method="post" class="cs-form">
            @csrf
            <h5 class="text-center mb-3">
                Thêm lớp học
            </h5>
            <div class="mb-3 row mb-4">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Tên lớp học</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Mô tả lớp học</label>
                    <input type="text" class="form-control" name="description">
                </div>
            </div>
            <div class="mb-3 row mb-4">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Thời gian bắt đầu</label>
                    <input type="date" class="form-control" name="start_date">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Thời gian kết thúc</label>
                    <input type="date" class="form-control" name="end_date">
                </div>
            </div>
            <div class="mb-3 row mb-4">
                <div class="col-4">
                    <div class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#coachModal" style="width:100%">
                        Chọn huấn luyện viên
                    </div>
                </div>
                <div class="col-4">
                    <div class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#studentModal" style="width:100%">
                        Chọn học sinh
                    </div>
                </div>
                <div class="col-4">
                    <select class="form-select" aria-label="Default select example" name="court_id">
                        <option selected>---Chọn sân--</option>
                        @foreach ($courts as $court)
                            <option value="{{ $court->id }}">{{ $court->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">

            </div>
            <button type="submit" class="btn btn-primary cs-btn">Tạo lớp</button>
            @include('admin.class.modal-coach')
            @include('admin.class.modal-student')
        </form>
    </div>
@endsection
