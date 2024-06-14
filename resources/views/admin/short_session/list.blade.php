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
        <h1>Danh sách Thời gian ca học</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Thời gian bắt đầu</th>
                    <th scope="col">Thời gian kết thúc</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            @foreach ($short_sessions as $index => $short_session)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $short_session->name }}</td>
                    <td>{{ $short_session->start_time }}</td>
                    <td>{{ $short_session->end_time }}</td>
                    <td>
                        <a href="{{ route('short-session.update', $short_session->id) }}" class="btn btn-primary">
                            Chỉnh sửa
                        </a>

                        <form action="{{ route('short-session.delete', $short_session->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa ca này không?');">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection