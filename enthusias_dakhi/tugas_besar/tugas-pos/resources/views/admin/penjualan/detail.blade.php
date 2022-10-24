@extends('layouts.admin')

@section('header', 'Detail Penjualan')

@section('content')
<div class="row">
          <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('penjualans/'.$penjualans->id) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="diskon" class="form-control" placeholder="Enter name" required="" value="{{ $penjualans->diskon }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
</div>
@endsection