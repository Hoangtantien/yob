@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('achievement.create.store') }}" method="post" class="cs-form" style="width:1000px">
            @csrf
            <h5 class="text-center mb-3">
                Thêm thành tích
            </h5>
            <div class="mb-5 row">
                <div class="col-3">
                    <label for="exampleInputEmail1" class="form-label" style="margin-bottom: 30px;">Tên thành tích <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-3">
                    <label for="exampleInputEmail1" class="form-label" style="margin-bottom: 30px;">Mô tả thành tích </label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="col-3">
                    <label for="exampleInputEmail1" class="form-label" style="margin-bottom: 30px;">Chọn HLV </label>
                    <div class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#coach_achievement" style="width:100%">Danh sách HLV</div>
                </div>
                <div class="col-3">
                    <label for="exampleInputEmail1" class="form-label">Có thêm lương? <br>
                         <small>thêm 50,000 VND vào lương cơ bản</small> </label>
                    <select class="form-select mb-3" aria-label="example" name="raise_salary">
                        <option value="0" selected>Không</option>
                        <option value="1">Có</option>
                      </select>
                </div>
            </div>
           @include('admin.achievement.add-modal')
            
            <div class="mb-3 btn-box">
                <a href="{{ route('achievement.list') }}" class="btn btn-secondary ">Quay lại</a>
                <button type="submit" class="btn btn-primary ">Thêm thành tích</button>
            </div>
        </form>
    </div>
@endsection
