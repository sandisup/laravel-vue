@extends('layouts.admin')
@section('header', 'Transaction')

@section('content')

@role('petugas')
<component id="controller">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ url('transactions/create') }}" class="btn btn-sm btn-primary pull=right">Add New Transaction</a>
                </div>
                <div class="col-md-2">
                <select class="form-control" name="">
                    <option value="">Status</option>
                    <option value="">Dikembalikan</option>
                    <option value="">Pengembalian terlambat</option>
                </select>
                </div>
                <div class="col-md-2">
                <select class="form-control" name="">
                    <option value="">Waktu peminjaman</option>
                    <option value="">Juni</option>
                    <option value="">Juli</option>
                </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th width="30px">N0.</th>
                    <th class='text-center'>Date Start</th>
                    <th class='text-center'>Date End</th>
                    <th class='text-center'>Member Name</th>
                    <th class='text-center'>Lama Pinjam(hari)</th>
                    <th class='text-center'>Total Buku</th>
                    <th class='text-center'>Total Bayar</th>
                    <th class='text-center'>Status</th>
                    <th class='text-center'>Action</th>
                    </tr>
                </thead>                       
            </table>
        </div>
    </div>
</component>
@endrole
@endsection