@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('court.create.store') }}" method="post" class="cs-form">
            @csrf
            <h5 class="text-center mb-3">
                Thêm sân bóng
            </h5>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên sân</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="name">
            </div>

            <button type="submit" class="btn btn-primary cs-btn">Tạo sân</button>
        </form>
    </div>
@endsection
