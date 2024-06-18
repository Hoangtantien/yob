@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('short-session.create.store') }}" method="post" class="cs-form">
            @csrf
            <h5 class="text-center mb-3">
                Thêm ca học
            </h5>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên ca học</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thời gian bắt đầu</label>
                <input type="time" class="form-control" name="start_time">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thời gian kết thúc</label>
                <input type="time" class="form-control" name="end_time">
            </div>
            <div class="mb-3 btn-box">
                <button type="submit" class="btn btn-primary ">Tạo ca học</button>
                <a href="{{ route('short-session.list') }}" class="btn btn-secondary ">Quay lại</a>
            </div>
        </form>
    </div>
@endsection
