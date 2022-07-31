@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('catalogs/create') }}" class="btn btn-sm btn-primary pull right">Create New Catalog</a>
                    <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-append">
                </div>
            </div>
        </div>
    </div>
            
            <div class="card-body table-responsive p-0">
             <table class="table table-hover text-nowrap">
            <thead class="text-center">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Total Book</th>
                <th>Created at</th>
                <th>Update at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody  class="text-center">
            @foreach ($catalogs as $key=> $catalog)
            <tr>
                <td>{{ $key+1 }}.</td>
                <td>{{ $catalog->name }}</td>
                <td>{{ count($catalog->books)}} </td>
                <td>{{ convert_date($catalog->created_at) }} </td>
                <td>{{ date('H:i:s - d M Y', strtotime($catalog->updated_at))}} </td>
                <td>
                    <form action="{{ url('catalogs', ['id'=>$catalog->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-info btn-sm">Edit</a>
                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure ?')">                    
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div>
    </div>
@endsection