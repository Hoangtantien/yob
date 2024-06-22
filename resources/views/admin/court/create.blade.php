@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('court.create.store') }}" method="post" class="cs-form">
            @csrf
            <h5 class="text-center mb-3">
                Thêm sân bóng
            </h5>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Tên sân bóng <span class="required">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Mô tả </label>
                    <input type="text" class="form-control" name="description">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Thời gian mở cửa <span
                            class="required">*</span></label>
                    <input type="time" class="form-control" name="open_time">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Thời gian đóng cửa <span
                            class="required">*</span></label>
                    <input type="time" class="form-control" name="close_time">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Địa chỉ sân <span class="required">*</span></label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Số điện thoại <span class="required">*</span></label>
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Ảnh sân</small></label>
                    <input class="form-control" type="file" id="upload" name="file"
                        data-url="{{ route('upload.services') }}">

                    <div id="preview">

                    </div>
                    <input type="hidden" id="file" name="img">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Loại sân <span class="required">*</span></label>
                    <select class="form-select" aria-label="Default select example" name="type">
                        <option selected> ---Chọn loại sân---</option>
                        <option value="1">Sân trong nhà</option>
                        <option value="2">Sân ngoài trời</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 btn-box">
                <a href="{{ route('court.list') }}" class="btn btn-secondary ">Quay lại</a>
                <button type="submit" class="btn btn-primary ">Tạo sân</button>
            </div>
        </form>
    </div>
@endsection
