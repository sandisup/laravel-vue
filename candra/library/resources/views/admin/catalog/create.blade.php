@extends('layouts.admin')
@section('header', 'Create New Catalog')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Input Catalog</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ url('catalogs') }} " method="post">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Name Catalog" required>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection