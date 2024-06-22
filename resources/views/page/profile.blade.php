@extends('layouts.app')
@section('content')
    <form action="{{ route('user.update.store', $user->id) }}" method="post" class = "cs-form">
        @csrf
        <h5 class="text-center">
            Thay đổi thông tin cá nhân
        </h5>
        <div class="mb-3 row">
            <div class="col-12">
                <label for="exampleInputEmail1" class="form-label">Email address <span class="required">*</span></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" value="{{ $user->email }}">
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Tên người dùng <span class="required">*</span></label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Ngày tháng năm sinh</label>
                <input type="date" class="form-control" name="dob" value="{{ $user->dob }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Số điện thoại <span class="required">*</span></label>
                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="address" value="{{ $user->address }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Ngày làm việc</label>
                <input type="date" class="form-control" name="start_working" value="{{ $user->start_working }}" readonly>
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Ngày nghỉ</label>
                <input type="date" class="form-control"name="end_working" value="{{ $user->end_working }}" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Lương cơ bản <small>(theo ca)</small></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="base_salary" value="{{ $user->base_salary }}" readonly>
            </div>
            <div class="col-6">
                <label for="" class="mb-2">Chức vụ </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="" value="{{ $user->getType() }}" readonly>
                    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="type" value="{{ $user->type }}" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</small></label>
                <input type="file" class="form-control" id="upload" aria-describedby="emailHelp" name="file" data-url="{{ route('upload.services') }}">
                <div id="preview">
                    <a href="">
                        <img src="{{ showImage($user->avatar) }}" alt="">
                    </a>
                </div>
                <input type="hidden" id="file" name="avatar" value="{{ $user->avatar }}">
            </div>

        </div>
        <input type="hidden" id="profile" name="profile" value="1">

        <div class="mb-3 btn-box">
            <button type="submit" class="btn btn-primary "onclick="return confirm('Bạn có chắc chắn muốn lưu thay đổi?');">Lưu</button>
        </div>
    </form>
    </div>
@endsection
