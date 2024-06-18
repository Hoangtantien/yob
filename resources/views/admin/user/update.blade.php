@extends('layouts.app')
@section('content')
    <form action="{{ route('user.update.store', $user->id) }}" method="post" class = "cs-form">
        @csrf
        <h5 class="text-center">
          Cập nhật người dùng
        </h5>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$user->email}}">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$user->name}}">
            
          </div>
          <div class="mb-3">
            <label for="exampleInputPhonenumber" class="form-label">SĐT</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="{{$user->phone}}">
          </div>
          <div class="mb-3">
            <label for="exampleInputPhonenumber" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="{{$user->address}}">
          </div>
          <div class="mb-3">
            <label for="exampleInputPhonenumber" class="form-label">Lương cơ bản <small>(theo ca)</small></label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="base_salary" value="{{$user->base_salary}}">
          </div>
          <div class="mb-3">
            <label for="" class="mb-2"> Chức vụ</label>
          <select class="form-select" aria-label="Default select example" name="type">
            <option selected>---Chức vụ---</option>
            <option value="0" {{$user->type === 0 ? "selected" : ""}}>Quản trị viên</option>
            <option value="1" {{$user->type == 1 ? "selected" : ""}}>Giám đốc</option>
            <option value="2" {{$user->type == 2 ? "selected" : ""}}>Huấn luyện viên</option>
          </select>
        </div>
          
        <div class="mb-3 btn-box">
          <button type="submit" class="btn btn-primary ">Cập nhật người dùng</button>
          <a href="{{ route('user.list') }}" class="btn btn-secondary ">Quay lại</a>
      </div>
      </form>
</div>

@endsection
