@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container cs-container">
            <div class="box-header">
                <div class="box-header-left">
                    <h5>Danh sách thành tích đạt được của {{ auth()->user()->name }}
                    </h5>
                </div>
                {{-- <form class="box-header-right">
                    <input type="text" class="form-control" placeholder="Nhập tên học sinh" name="search">
                    <button class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
                        </svg>
                    </button>
                </form> --}}
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên thành tích</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Ngày đạt thành tích</th>
                    </tr>
                </thead>
                @foreach ($achievements as $index => $achievement)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $achievement->name }}</td>
                        <td>{{ $achievement->description }}</td>
                        <td>{{ $achievement->pivot->date_achieved ? \Carbon\Carbon::parse($achievement->pivot->date_achieved)->format('d/m/Y') : 'N/A' }}</td>

                    </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-end">

                {{ $achievements->links('vendor.pagination.bootstrap-4') }}

            </div>
        </div>
    </div>
@endsection
