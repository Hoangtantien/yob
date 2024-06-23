@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('achievement.update.store',$achievement->id) }}" method="post" class="cs-form">
            @csrf
            <h5 class="text-center mb-3">
                Chỉnh sửa thành tích
            </h5>
            <div class="mb-5 row">
                <div class="col-4">
                    <label for="exampleInputEmail1" class="form-label">Tên thành tích <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $achievement->name }}">
                </div>
                <div class="col-4">
                    <label for="exampleInputEmail1" class="form-label">Mô tả thành tích </label>
                    <input type="text" class="form-control" name="description" {{ $achievement->description }}>
                </div>
                <div class="col-4">
                    <label for="exampleInputEmail1" class="form-label">Chọn huấn luyện viên </label>
                    <div class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#coach_achievement">Danh sách huấn luyện viên</div>
                </div>
            </div>
           @include('admin.achievement.update-modal')
            
            <div class="mb-3 btn-box">
                <a href="{{ route('achievement.list') }}" class="btn btn-secondary ">Quay lại</a>
                <button type="submit" class="btn btn-primary ">Lưu</button>
            </div>
        </form>
    </div>
@endsection
