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
<div class="container cs-container">
  <h1>Danh sách người dùng</h1>
  <table class="table">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">SĐT</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Chức vụ</th>
              <th scope="col">thao tác</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($users as $index => $user)
              <tr>
                  <th scope="row">{{ $index + 1 }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ $user->address }}</td>
                    <td>
                  
                    @switch($user->type)
                        @case(0)
                            Admin
                            @break
                        @case(1)
                            Giám đóc
                            @break
                        @case(2)
                            Quản lý
                            @break
                        @case(3)
                            Huấn luyện viên
                            @break
                        @default
                            Không xác định
                    @endswitch
                    </td> 
                    <td> 
                        <a href="{{route('user.update',$user->id)}}" class="btn btn-primary">
                            chỉnh sửa
                        </a>
                        <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
                                Xóa
                            </button>
                        </form>
                    </d>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
@endsection