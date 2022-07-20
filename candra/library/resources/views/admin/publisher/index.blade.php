@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
<div class="container">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('publishers/create') }}" class="btn btn-sm btn-primary pull right">Create New Publisher</a>
                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                        <div class="input-group-append">
                    </div>
                        </div>
        </div>
                <div class="card-body table-responsive p-0">
                 <table class="table table-hover text-nowrap">
                <thead class="text-center">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th>Update at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody  class="text-center">
                @foreach ($publishers as $key=> $publisher)
                <tr>
                    <td>{{ $key+1 }}.</td>
                    <td>{{ $publisher->name }}</td>
                    <td>{{ $publisher->email }}</td>
                    <td>{{ $publisher->phone_number }}</td>
                    <td>{{ $publisher->address }}</td>
                    <td>{{ date('H:i:s - d M Y', strtotime($publisher->created_at)) }} </td>
                    <td>{{ date('H:i:s - d M Y', strtotime($publisher->updated_at))}} </td>
                    <td>
                        <form action="{{ url('publishers', ['id'=>$publisher->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-info btn-sm">Edit</a>
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