@extends('layouts.admin')
@section('header', 'Author')

@section('content')
<div class="container">
        <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Author</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Created at</th>
                        <th>Update at</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $key=>$author)
                      <tr>
                        <td>{{ $key+1 }}.</td>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->email }}</td>
                        <td>{{ $author->phone_number }}</td>
                        <td>{{ $author->address }}</td>
                        <td>{{ date('H:i:s - d M Y', strtotime($author->created_at)) }} </td>
                        <td>{{ date('H:i:s - d M Y', strtotime($author->updated_at))}} </td>
                      </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
</div>
@endsection