@extends('layouts.admin')
@section('header', 'Transaction')

@section('content')
<div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Transaction</h3>
              </div>
              <form action="{{ url('transactions') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Anggota</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required="">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <br>Peminjaman
                    <input type="date" name="name" class="form-control" placeholder="Enter name" required=""><br>
                    Pengembalian
                    <input type="date" name="name" class="form-control" placeholder="Enter name" required="">
                  </div>
                  <div class="form-group">
                    <label>Buku</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required="">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
</div>
@endsection