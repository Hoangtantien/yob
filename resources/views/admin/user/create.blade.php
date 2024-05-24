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
    <form action="{{ route('user.create.store') }}" method="post" class="cs-form">
        @csrf
        <h5 class="text-center mb-3">
          Them nguoi dung
        </h5>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPhonenumber" class="form-label">SĐT</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
          </div>
        <div class="mb-3">
          <label for="" class="mb-2">Chuc vu</label>
          <select class="form-select" aria-label="Default select example" name="type">
            <option selected>---Chon chuc vu---</option>
            <option value="0">Admin</option>
            <option value="1">Quan ly</option>
            <option value="2">HLV</option>
          </select>
        </div>
          
        <button type="submit" class="btn btn-primary cs-btn">Tao nguoi dung</button>
      </form>
</div>

@endsection