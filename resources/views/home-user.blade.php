@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container cs-container home-section">
        <div class="row mb-3">
            <div class="col-md-4">
                <a href="{{ route('manage.class.list-all') }}" class="card">
                    <div class="card-header text-center">Danh sách lớp học</div>
                    <div class="card-body text-center">
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('court.list') }}" class="card">
                    <div class="card-header text-center">Danh sách sân bóng rổ</div>
                    <div class="card-body text-center">
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('achievement.user-achievement', auth()->user()->id) }}" class="card">
                    <div class="card-header text-center">Thành tích đạt được</div>
                    <div class="card-body text-center">
                    </div>
                </a>
            </div>
            
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <a href="{{ route('timelog.get-checkin') }}" class="card">
                    <div class="card-header text-center">Chấm công</div>
                    <div class="card-body text-center">
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('salary.list', auth()->user()->id) }}" class="card">
                    <div class="card-header text-center">Bảng lương</div>
                    <div class="card-body text-center">
                    </div>
                </a>
            </div>
            
        </div>
    </div>
</div>

@endsection
