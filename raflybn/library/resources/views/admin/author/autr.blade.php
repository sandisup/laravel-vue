@extends('layouts.admin')
@section('header', 'author')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                     <h3 class="card-title">Data Author</h3>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead style="font-size:12px">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="text-center">NAMA</th>
                                    <th class="text-center">EMAIL</th>
                                    <th>PHONE NUMBER</th>
                                    <th class="text-center">ADDRESS</th>
                                    <th>TOTAL BOOKS</th>
                                    <th>CREATED AT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $key => $author)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->email }}</td>
                                    <td>{{ $author->phone_number }}</td>
                                    <td>{{ $author->addres }}</td>
                                    <td>{{ count($author->books) }}</td>
                                    <td>{{ date('d/m/y-H:i:s',strtotime($author->created_at)) }}</td>
                                @endforeach
                                </tr>  
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
</section>
@endsection