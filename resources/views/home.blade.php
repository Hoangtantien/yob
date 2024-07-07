@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container cs-container home-section">
        <div class="row mb-3">
            <div class="col-md-4">
                <a href="{{ route('user.list') }}" class="card">
                    <div class="card-header text-center">Danh sách lớp học</div>
                    <div class="card-body text-center">
                        {{ $coaches }}
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('manage.class.list-all') }}"class="card">
                    <div class="card-header text-center">Số lượng lớp học</div>
                    <div class="card-body text-center">
                        {{ $classes }}
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('students.list') }}" class="card">
                    <div class="card-header text-center">Số lượng học sinh</div>
                    <div class="card-body text-center">
                        {{ $students }}
                    </div>
                </a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <a href="{{ route('achievement.list') }}" class="card">
                    <div class="card-header text-center">Số lượng thành tích</div>
                    <div class="card-body text-center">
                        {{ $coaches }}
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('court.list') }}" class="card">
                    <div class="card-header text-center">Số lượng sân bóng rổ</div>
                    <div class="card-body text-center">
                        {{ $classes }}
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('timelog.list') }}" class="card">

                    <div class="card-header text-center">Danh sách chấm công</div>
                    <div class="card-body text-center" >
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
