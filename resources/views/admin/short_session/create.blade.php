@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
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

            <button type="submit" class="btn btn-primary cs-btn">Tạo ca học</button>
        </form>
    </div>
@endsection
