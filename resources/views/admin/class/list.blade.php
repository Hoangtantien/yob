@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container cs-container">
            <h1>Danh sách lớp học</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Thời gian bắt đầu</th>
                        <th scope="col">Thời gian kết thúc</th>
                        <th scope="col">Sân</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                @foreach ($classes as $index => $class)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->start_date }}</td>
                        <td>{{ $class->end_date }}</td>
                        <td>{{ $class->court->name }}</td>
                        <td>
                            <a href="{{ route('class.update', $class->id) }}" class="btn btn-primary">
                                chỉnh sửa
                            </a>
                            <form action="{{ route('class.delete', $class->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa lớp này không?');">
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
