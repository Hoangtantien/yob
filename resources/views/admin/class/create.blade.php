@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <form action="{{ route('class.create.store') }}" method="post" class="cs-form">
        @csrf
        <h5 class="text-center mb-3">
          Thêm lớp học
        </h5>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên lớp</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" >          
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số lượng</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amount">          
          </div>
          <div class="mb-3">
            <label for="" class="mb-2"> Sân</label>
          <select class="form-select" aria-label="Default select example" name="type">
            <option selected>---Sân--</option>
            {{-- <option value="0" {{$user->type == 0 ? "selected" : ""}}>Admin</option>
            <option value="1" {{$user->type == 1 ? "selected" : ""}}>Quản lý</option>
            <option value="2" {{$user->type == 2 ? "selected" : ""}}>HLV</option> --}}
          </select>
        </div>   
        <button type="submit" class="btn btn-primary cs-btn">Tạo lớp</button>
      </form>
</div>

@endsection 