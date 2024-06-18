@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container cs-container">
            <h1>Danh sách Sân</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                @foreach ($courts as $index => $court)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $court->name }}</td>
                        <td>
                            <a href="{{ route('court.update', $court->id) }}" class="btn btn-primary">
                                Chỉnh sửa
                            </a>

                            <form action="{{ route('court.delete', $court->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sân này không?');">
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
