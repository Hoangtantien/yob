@extends('layouts.app')
@section('content')
    <form action="{{ route('user.update.store', $user->id) }}" method="post" class = "cs-form">
        @csrf
        <h5 class="text-center">
            Cập nhật người dùng
        </h5>
        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Email address <span class="required">*</span></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" value="{{ $user->email }}">
            </div>
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Bạn không có quyền hạn này" name="" readonly>

            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label" >Tên người dùng <span class="required">*</span></label>
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
                <input type="date" class="form-control" name="start_working" value="{{ $user->start_working }}">
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Ngày nghỉ</label>
                <input type="date" class="form-control"name="end_working" value="{{ $user->end_working }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Lương cơ bản <small>(theo ca)</small></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="base_salary"  value="{{ $user->base_salary }}">
            </div>
            <div class="col-6">
                <label for="" class="mb-2">Chức vụ <span class="required">*</span></label>
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected>---Chọn chức vụ---</option>
                    <option value="0" {{ $user->type === 0 ? "selected" : "" }}>Quản trị viên</option>
                    <option value="1"{{ $user->type === 1 ? "selected" : "" }}>Giám đốc</option>
                    <option value="2"{{ $user->type === 2 ? "selected" : "" }}>Huấn luyện viên</option>
                </select>
            </div>
        </div>
        {{-- <div class="mb-3 row">
          <div class="col-6">
              <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</small></label>
              <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  name="base_salary">
          </div>
          <div class="col-6">
              <div id="preview_image">

              </div>
          </div>
      </div> --}}

        <div class="mb-3 btn-box">
          <a href="{{ route('user.list') }}" class="btn btn-secondary ">Quay lại</a>
          <button type="submit" class="btn btn-primary ">Lưu</button>
        </div>
    </form>
    </div>
@endsection
