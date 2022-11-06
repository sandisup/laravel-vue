@extends('layouts.admin')
@section('header', 'publisher')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <a href="{{ url('publishers/create') }}" class="btn-sm btn-primary pull-right">Create New Publisher</a>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead style="font-size:12px">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">EMAIL</th>
                                    <th>PHONE NUMBER</th>
                                    <th class="text-center">ADDRESS</th>
                                    <th class="text-center">TOTAL BOOKS</th>
                                    <th>CREATED AT</th>
                                    <th class="text-center">ACTION</th>          
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($publishers as $key => $publisher)
                                <tr style="font-size:15px">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $publisher->name }}</td>
                                    <td>{{ $publisher->email }}</td>
                                    <td>{{ $publisher->phone_number }}</td>
                                    <td>{{ $publisher->address }}</td>
                                    <td class="text-center">{{ count($publisher->books) }}</td>
                                    <td>{{ date('d/m/y-H:i:s',strtotime($publisher->created_at)) }}</td>
                                    <td><a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ url('publishers', ['id' => $publisher->id]) }}" method="post">
                                       <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                       @method('delete')
                                       @csrf
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection