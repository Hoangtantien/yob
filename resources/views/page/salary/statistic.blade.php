@extends('layouts.app')

@section('content')
    <style>
        .list_short-session-table .list_short-session-item {
            padding: 29.8px 25px;
            white-space: nowrap;
        }
    </style>
    <?php
    use App\Models\Salary;
    
    ?>
    <div id="statistic-section">
        <div class="statistic-header">
            <div class="box-header-left">
                <h5>Thống kê lương năm {{ $year }}
                </h5>
            </div>
            <form action="">
                <div class="row justify-content-start">
                    <div class="col-4">
                        <div class="label">Chọn tháng: </div>
                        <select class="form-control search-input" name="selected_month" id ="selected_month">
                            <option value="">---Chọn tháng---</option>
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
                                $selected = isset($_GET['selected_month']) && $_GET['selected_month'] == $monthNumber ? 'selected' : '';
                                echo "<option value=\"$monthNumber\" $selected>$monthName</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-4 filter-item">
                        <div class="label">Chọn năm: </div>
                        <select class="form-control search-input" name="selected_year" id ="selected_year">
                            <option value="">---Chọn năm---</option>
                            <?php
                            $currentYear = date('Y');
                            $startYear = $currentYear - 20;
                            $endYear = $currentYear;
                            
                            for ($year = $endYear; $year >= $startYear; $year--) {
                                $selected = isset($_GET['selected_year']) && $_GET['selected_year'] == $year ? 'selected' : '';
                                echo "<option value=\"$year\" $selected>$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <div class="filter-btn d-flex align-item-center justify-content-end">
                            <button class="btn btn-primary me-3" style="height:40px; width:130px;  margin-top: 28px;">
                                Lọc
                            </button>
                            <div class="btn btn-success export-statistic" type="button" id="button-addon1"
                                style="height:40px; width: 130px; margin-top: 28px;">
                                Xuất excel
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="statistic-table">
            <div class="timelog-list d-flex align-items-start">
                <div class="list_short-session-table">
                    <div class="list_short-session-header">
                        Nhân viên
                    </div>
                    <div class="list_short-session-body">
                        @foreach ($users as $user)
                            <div class="list_short-session-item">
                                {{ $user->name }}

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="list-date-table table-responsive" style="overflow-x: auto;">
                    <table class="table" style="box-shadow: none">
                        <thead>
                            @foreach ($months as $month)
                                <th class="day">
                                    <span>
                                        {{ $month['name'] }}
                                    </span>
                                </th>
                            @endforeach
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    @foreach ($months as $month)
                                        <td class="">
                                            <?php
                                        $has_salary = Salary::hasSalaryRecords($user->id, $month['number'], $month['year']);
                                        if($has_salary){
                                            $salary = Salary::getSalaryByUserId($user->id, $month['number'], $month['year'], null);
                                            if ($salary->isNotEmpty()) {
                                                        $salary_number = $salary[0]->calculated_salary;
                                                        $salary_format = number_format($salary_number, 0, ',', ',');
                                                        ?>
                                            <div class="show-salary-detail">
                                                {{ $salary_format }}
                                            </div>
                                            <?php
                                        } else {
                                            echo 0;
                                        }
                                    } else {
                                        echo 0;
                                    }
                                    
                                    ?>
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
@endsection
