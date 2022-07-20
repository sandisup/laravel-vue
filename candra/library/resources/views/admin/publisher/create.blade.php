@extends('layouts.admin')
@section('header', 'Create New Publisher')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Input Publisher</h3>
    </div>
    <form action="{{ url('publishers') }} " method="post">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Name Publisher" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address" required>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection