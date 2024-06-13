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
        {{-- <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{$user->}}">
        </div> --}}
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
            <label for="" class="mb-2"> Chức vụ</label>
          <select class="form-select" aria-label="Default select example" name="type">
            <option selected>---Chức vụ---</option>
            <option value="0" {{$user->type == 0 ? "selected" : ""}}>Admin</option>
            <option value="1" {{$user->type == 1 ? "selected" : ""}}>Giám đóc</option>
            <option value="2" {{$user->type == 2 ? "selected" : ""}}>Quản lý</option>
            <option value="3" {{$user->type == 3 ? "selected" : ""}}>Huấn luyện viên</option>
          </select>
        </div>
          
        <button type="submit" class="btn btn-primary cs-btn">Thêm người dùng</button>
      </form>
</div>

@endsection
