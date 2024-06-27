@extends('layouts.app')

@section('content')
<style>
    .box-header{
        flex-direction: column;
        align-items: flex-start;
    }
    #month-form{
        width: 100%;
    display: flex;
    gap: 20px;
    align-items: center;
    margin-top: 20px
    }
    #selected_month{
        flex: 0 0 300px;
    }
</style>
    <div class="container">
        <div class="container cs-container">
            <div class="box-header">
                <h5>Danh sách chấm công</h5>
                <form action="" method="get" id="month-form">
                    Chọn tháng
                    <select name="selected_month" id="selected_month" class="form-control"
                        onchange="document.getElementById('month-form').submit();">
                        <?php
                        $vietnameseMonths = [
                            1 => 'Tháng 1',
                            2 => 'Tháng 2',
                            3 => 'Tháng 3',
                            4 => 'Tháng 4',
                            5 => 'Tháng 5',
                            6 => 'Tháng 6',
                            7 => 'Tháng 7',
                            8 => 'Tháng 8',
                            9 => 'Tháng 9',
                            10 => 'Tháng 10',
                            11 => 'Tháng 11',
                            12 => 'Tháng 12',
                        ];
                        foreach ($vietnameseMonths as $monthNumber => $monthName) {
                            $selected = $selectedMonth == $monthNumber ? 'selected' : '';
                            echo "<option value=\"$monthNumber\" $selected>$monthName</option>";
                        }
                        ?>
                    </select>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Huấn luyện viên</th>
                        <th scope="col">Tổng số ca dạy</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td >{{ $user->totalSessions > 0 ? $user->totalSessions : "Chưa có thông tin" }}</td>
                            <td>
                                <a href="{{ route('timelog.detail', ['id' => $user->id, 'month' => $selectedMonth]) }}" class="btn btn-primary">
                                    Chi tiết
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $users->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
