@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')

<div class="content">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
</div>
</div>
</div>
</section>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('publishers/create') }}" class="btn btn-sm btn-primary pull=right">Create New publisher</a>
            </div>
        </div>
    </div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>N0</th>
<th class='text-center'>Name</th>
<th class='text-center'>Email</th>
<th class='text-center'>Phone Number</th>
<th class='text-center'>Address</th>
<th class='text-center'>Action</th>

</tr>
</thead>
<tbody>
    @foreach($publishers as $key => $publisher)
    <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $publisher->name }}</td>
            <td>{{ $publisher->email }}</td>
            <td>{{ $publisher->phone_number }}</td>
            <td>{{ $publisher->address }}</td>
            <td class='text-center'>
                <a href="{{ url('publishers/'.$publisher->id. '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
            
            <form action="{{ url('publishers', ['id' => $publisher->id]) }}" method="post">
                <input class="btn btn-sm btn-danger" type="submit" value="Delete" onclick="return confirm('are you sure?')">
                @method('delete')
                @csrf
            </form>

            </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>

</div>

</div>
</div>

</div>

@endsection