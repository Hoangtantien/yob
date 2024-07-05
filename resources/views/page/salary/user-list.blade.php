@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container cs-container-large">
            <div class="box-header">
                <div class="box-header-left">
                    <h5>Danh sách bảng lương</h5>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Tháng</th>
                        <th scope="col">Năm</th>
                        <th scope="col" class="text-center">Tổng số ca</th>
                        <th scope="col">Lương cơ bản</th>
                        <th scope="col">Lương được tính</th>
                        <th scope="col">Tạo bởi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salaries as $index => $salary)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $salary->title }}</td>
                            <td>{{ $vietnameseMonths[$salary->month] }}</td>
                            <td>{{ $salary->year }}</td>
                            <td class="text-center">{{ $salary->total_session }}</td>
                            <td>{{ showPrice($salary->user_base_salary) }}</td>
                            <td>{{ showPrice($salary->calculated_salary) }}</td>
                            <td>{{ $salary->createdBy->name }}</td>
                         
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">

                {{ $salaries->links('vendor.pagination.bootstrap-4') }}

            </div>
        </div>
    </div>
@endsection
