@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('user.create.store') }}" method="post" class="cs-form" style="width:800px">
            @csrf
            <h5 class="text-center mb-3">
                Thêm người dùng
            </h5>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="col-6">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  
                </div>
            </div>
           
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="name">
                <div class="mb-3">
                    <label for="exampleInputDob" class="form-label">Ngày tháng năm sinh</label>
                    <input type="date" class="form-control" id="exampleInputDob" name="dob">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPhonenumber" class="form-label">SĐT</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="address">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Lương cơ bản <small>(theo ca)</small></label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  name="base_salary">
          </div>
            <div class="mb-3">
                <label for="" class="mb-2">Chức vụ</label>
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected>---Chọn chức vụ---</option>
                    <option value="0">Quản trị viên</option>
                    <option value="1">Giám đốc</option>
                    <option value="2">HLV</option>
                </select>
            </div>

            <div class="mb-3 btn-box">
              <button type="submit" class="btn btn-primary ">Tạo người dùng</button>
              <a href="{{ route('user.list') }}" class="btn btn-secondary ">Quay lại</a>
          </div>
        </form>
    </div>
@endsection
