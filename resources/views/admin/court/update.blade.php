@extends('layouts.app')
@section('content')

    <form action="{{ route('court.update.store', $court->id) }}" method="post" class = "cs-form">
        @csrf
        <h5 class="text-center">
          Cập nhật sân
        </h5>
        
        {{-- <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{$user->}}">
        </div> --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên sân</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$court->name}}">
        </div>
            <button type="submit" class="btn btn-primary cs-btn">Hoàn thành</button>
        
       
      </form>
</div>

@endsection
