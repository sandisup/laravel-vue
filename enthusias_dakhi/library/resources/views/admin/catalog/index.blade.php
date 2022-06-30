@extends('layouts.admin')
@section('header', 'Catalog')

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
                <a href="{{ url('catalogs/create') }}" class="btn btn-sm btn-primary pull=right">Create New Catalog</a>
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
<th class='text-center'>Total books</th>
<th class='text-center'>Created at</th>
<th class='text-center'>Updated at</th>
<th class='text-center'>Action</th>

</tr>
</thead>
<tbody>
    @foreach($catalogs as $key => $catalog)
    <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $catalog->name }}</td>
            <td class='text-center'>{{ count( $catalog -> books) }}</td>
            <td class='text-center'>{{ convert_date($catalog->created_at) }}</td>
            <td class='text-center'>{{ convert_date($catalog->updated_at) }}</td>
            <td class='text-center'>
                <a href="{{ url('catalogs/'.$catalog->id. '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
            
            <form action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="post">
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