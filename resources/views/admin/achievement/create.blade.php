@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('achievement.create.store') }}" method="post" class="cs-form">
            @csrf
            <h5 class="text-center mb-3">
                Thêm thành tích
            </h5>
            <div class="mb-5 row">
                <div class="col-4">
                    <label for="exampleInputEmail1" class="form-label">Tên thành tích <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-4">
                    <label for="exampleInputEmail1" class="form-label">Mô tả thành tích </label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="col-4">
                    <label for="exampleInputEmail1" class="form-label">Chọn huấn luyện viên </label>
                    <div class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#coach_achievement">Danh sách huấn luyện viên</div>
                </div>
            </div>
           @include('admin.achievement.add-modal')
            
            <div class="mb-3 btn-box">
                <a href="{{ route('achievement.list') }}" class="btn btn-secondary ">Quay lại</a>
                <button type="submit" class="btn btn-primary ">Thêm thành tích</button>
            </div>
        </form>
    </div>
@endsection
