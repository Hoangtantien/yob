@extends('layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <div id="timelog-section">
        <div class="timelog-header">
            Bảng chấm công
        </div>
        <div class="filer-wrap">
            <form action="" class="date-filter" method="get" id="month-form">
                Chọn tháng
                <select name="selected_month" id="selected_month" class="form-control" onchange="document.getElementById('month-form').submit();">
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
                        $selected = request()->get('selected_month', now()->month) == $monthNumber ? 'selected' : '';
                        echo "<option value=\"$monthNumber\" $selected>$monthName</option>";
                    }
                    ?>
                </select>
            </form>
            <div class="checkin-modal btn btn-outline-primary" data-toggle="modal" data-target="#checkinModal">
                Chấm công
            </div>
        </div>
        <div class="timelog-body">
            <div class="timelog-body-header" style="text-transform: uppercase">
                Danh sách chấm công {{ $currentMonth }}
            </div>
            <small>
                Số công hiện tại : {{ $totalTimelogs }}
            </small>
            <div class="timelog-list d-flex align-items-start">
                <div class="list_short-session-table">
                    <div class="list_short-session-header">
                        Ca học
                    </div>
                    <div class="list_short-session-body">
                        @foreach ($short_session as $session)
                            <div class="list_short-session-item">
                                <strong>
                                    {{ $session->name }}
                                </strong>
                                <br>
                                <small>
                                    ({{ $session->start_time }} - {{ $session->end_time }})
                                </small>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="list-date-table table-responsive" style="overflow-x: auto;">
                    <table class="table" style="box-shadow: none">
                        <thead>
                            @foreach ($days as $day)
                                <th class="day">
                                    <span>
                                        {{ $day['weekday'] }}
                                        ({{ sprintf('%02d', $day['day']) }}/{{ $day['month'] }})
                                    </span>
                                </th>
                            @endforeach
                        </thead>
                        <tbody>
                            @foreach ($short_session as $session)
                                <tr>
                                    @foreach ($days as $day)
                                        @php
                                            $isActive = false;
                                            foreach ($timelogs as $timelog) {
                                                if (
                                                    $timelog->short_session_id == $session->id &&
                                                    $timelog->date == $day['date']
                                                ) {
                                                    $isActive = true;
                                                    $activeClass = $timelog->projectClass->name ?? '';
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <td class="{{ $isActive ? 'active-timelog' : '' }}">
                                            @if ($isActive)
                                                <span class="text-white fw-bold">{{ $activeClass }}</span>
                                            @else
                                                <span style="visibility: hidden">sssssss</span>
                                            @endif
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('page.timelogs.modal-check-in')
@endsection
