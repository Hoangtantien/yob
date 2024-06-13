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
  <h1>Danh sách lớp học</h1>
  <table class="table">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Sân</th>
              <th scope="col">Thao tác</th>
          </tr>
      </thead>
      @foreach ($classes as $index => $class)
      <tr>
          <th scope="row">{{ $index + 1 }}</th>
          <td>{{ $class->name }}</td>
          <td>{{ $class->amount }}</td>
          <td>{{ $class->court }}</td>
          
            
            <td>  <a href="" class="btn btn-primary">
                Chi tiết
            </a>
                
                <a href="{{ route('class.update', $class->id) }}" class="btn btn-primary">
                    chỉnh sửa
                </a>

                <form action="{{ route('class.delete', $class->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa lớp này không?');">
                        Xóa
                    </button>
                </form>
            </d>
      </tr>
  @endforeach
  </table>
</div>
</div>
@endsection