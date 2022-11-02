@extends('layouts.admin')
@section('header', 'catalog')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('catalogs/create') }}" class="btn-sm btn-primary pull-right">Create New Catalog</a>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead style="font-size:13px">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">TOTAL BOOKS</th>
                                    <th class="text-center">CREATED AT</th>
                                    <th class="text-center">ACTION</th>        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($catalogs as $key => $catalog)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $catalog->name }}</td>
                                    <td class="text-center">{{ count ($catalog->books) }}</td>
                                    <td>{{ date('d/m/y-H:i:s',strtotime($catalog->created_at)) }}</td>
                                    <td class="text-center">
                                      <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                                      <from action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="post">
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
                </div>
            </div>
        </div>
    </div>
</section>            
@endsection