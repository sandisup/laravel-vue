@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Catalog</h3>
                    <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-append">
                </div>
            </div>
        </div>
    </div>
            
            <div class="card-body table-responsive p-0">
             <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Total Book</th>
                <th>Created at</th>
                <th>Update at</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($catalogs as $key=> $catalog)
            <tr>
                <td>{{ $key+1 }}.</td>
                <td>{{ $catalog->name }}</td>
                <td>{{ count($catalog->books)}} </td>
                <td>{{ date('H:m:s - d M Y', strtotime($catalog->created_at)) }} </td>
                <td>{{ date('H:m:s - d M Y', strtotime($catalog->updated_at))}} </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div>
</div>
@endsection