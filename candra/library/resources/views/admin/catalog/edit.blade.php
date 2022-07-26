@extends('layouts.admin')
@section('header', 'Create New Catalog')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Edit Catalog</h3>
    </div>
    <form action="{{ url('catalogs/'.$catalog->id) }} " method="post">
        @csrf
        {{ method_field('put') }}
      <div class="card-body">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Name Catalog" value="{{ $catalog->name }}" required>
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection