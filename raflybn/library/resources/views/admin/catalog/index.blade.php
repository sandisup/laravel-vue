@extends('layouts.admin')
@section('header', 'catalog')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Catalog</h3>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">TOTAL BOOKS</th>
                                    <th class="text-center">CREATED AT</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($catalogs as $key => $catalog)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $catalog->name }}</td>
                                    <td class="text-center">{{ count ($catalog->books) }}</td>
                                    <td>{{ date('d/m/y-H:i:s',strtotime($catalog->created_at)) }}</td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>            
@endsection