@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="container cs-container">
            <div class="box-header">
                <div class="box-header-left">
                    <h5>Danh sách thời gian ca học</h5>
                    <a href="{{ route('short-session.create') }}" class="btn btn-outline-primary">Thêm</a>
                </div>
                <form class="box-header-right">
                    <input type="text" class="form-control" placeholder="Nhập tên ca học" name="search">
                    <button class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
                        </svg>
                    </button>
                </form>
            </div>

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

                            <form action="{{ route('short-session.delete', $short_session->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa ca này không?');">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-end">

                {{ $short_sessions->links('vendor.pagination.bootstrap-4') }}

            </div>
        </div>
    </div>
@endsection
