@extends('layouts.app')
@section('content')
    <form action="{{ route('court.update.store', $court->id) }}" method="post" class = "cs-form">
        @csrf
        <h5 class="text-center">
            Cập nhật sân
        </h5>

        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Tên sân <span class="required">*</span></label>
                <input type="text" class="form-control" name="name" value="{{ $court->name }}">
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Mô tả </label>
                <input type="text" class="form-control" name="description" value="{{ $court->description }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Thời gian mở cửa <span class="required">*</span></label>
                <input type="time" class="form-control" name="open_time" value="{{ $court->open_time }}">
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Thời gian đóng cửa <span
                        class="required">*</span></label>
                <input type="time" class="form-control" name="close_time" value="{{ $court->close_time }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Địa chỉ sân <span class="required">*</span></label>
                <input type="text" class="form-control" name="address" value="{{ $court->address }}">
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Loại sân <span class="required">*</span></label>
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected> ---Chọn loại sân---</option>
                    <option value="1" {{ $court->type === 1 ? 'selected' : '' }}>Sân trong nhà</option>
                    <option value="2" {{ $court->type === 2 ? 'selected' : '' }}>Sân ngoài trời</option>
                </select>
            </div>
        </div>
        <div class="mb-3 btn-box">
            <a href="{{ route('court.list') }}" class="btn btn-secondary ">Quay lại</a>
            <button type="submit" class="btn btn-primary ">Lưu</button>
        </div>
    </form>
    </div>
@endsection
