@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container cs-container-large">
            <div class="box-header">
                <div class="box-header-left">
                    <h5>Danh sách lớp học</h5>
                  
                </div>
                <form class="box-header-right">
                    <input type="text" class="form-control" placeholder="Nhập tên lớp học" name="search">
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
                        <th scope="col">Tên lớp</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Thời gian bắt đầu</th>
                        <th scope="col">Thời gian kết thúc</th>
                        <th scope="col">Sân bóng</th>
                        <th scope="col"> Học sinh</th>
                        <th scope="col"> Huấn luyện viên</th>
                    </tr>
                </thead>
                @foreach ($classes as $index => $class)
                    <tr>
                        <td>{{ $class->name }}</td>
                        <td >
                            {{ strlen($class->description) > 30 ? substr($class->description, 0, 30) . '...' : $class->description }}
                        </td>

                        <td>{{ $class->start_date }}</td>
                        <td>{{ $class->end_date }}</td>
                        <td>
                            <div class="show-modal-event" data-url="{{ route('class.detail',$class->id) }}" data-type="court">
                                {{ isset($class->court_id) ? $class->court->name : "Chưa có sân" }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="show-modal-event" data-url="{{ route('class.detail',$class->id) }}" data-type="student">
                                {{ count($class->students) }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="show-modal-event" data-url="{{ route('class.detail',$class->id) }}" data-type="coaches">
                                {{ count($class->coaches) }}
                            </div>
                        </td>
                       
                    </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-end">

                {{ $classes->links('vendor.pagination.bootstrap-4') }}

            </div>
        </div>
    </div>
@endsection
