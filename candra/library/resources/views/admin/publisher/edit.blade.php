@extends('layouts.admin')
@section('header', 'Create New Publisher')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Edit Publisher</h3>
    </div>
    <form action="{{ url('publishers/'.$publisher->id) }} " method="post">
        @csrf
        {{ method_field('put') }}
      <div class="card-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name Publisher" value="{{ $publisher->name }}" required>          
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $publisher->email }}" required>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="{{ $publisher->phone_number }}" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $publisher->address }}" required>
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection