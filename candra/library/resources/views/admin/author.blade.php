@extends('layouts.admin')
@section('header','Author')
@section('css')
    
@endsection
    
@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <a href="#" data-target="#modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create New Author</a>
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
                    {{-- <th>Created at</th>
                    <th>Update at</th> --}}
                    <th>Action</th>
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
                    {{-- <td>{{ date('H:i:s - d M Y', strtotime($author->created_at)) }} </td>
                    <td>{{ date('H:i:s - d M Y', strtotime($author->updated_at))}} </td> --}}
                    <td class="text-center" style="width: 10vw">
                        <a href="#" @click="editData( {{ $author }} )" class="btn btn-primary btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                    @endforeach
                
                </tbody>
            </table>
            </div>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ url('authors') }} " autocomplete="off">
                        <div class="modal-header">
                        <h4 class="modal-title">Create New Auhtor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="" required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="" required="">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="" required="">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="" required="">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
                </div>
            </div>
        </div>
                <!-- /.modal-dialog -->
    </div>
</div>
@endsection

@section('js')
    {{-- <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data : {
                data : {},
                actionUrl : '{{ url('authors') }}',
            },
            mounted: function(){

            },
            methods: {
                addData(){
                    console.log('add Data');
                    data: {},
                    actionUrl: '{{ url('authors') }}'
                },
                editData(data){
                    console.log(data);
                },
                deleteData(){

                }
                // submitForm(event,id){
                //     event.preventDefault();
                //     const _this = this;
                //     var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                //     axios.post(actionUrl,new FormData($(event.target)[0])).then(response =>  {
                //         $('#modal-default').modal('hide');
                //         _this.table.ajax.reload();
                //     });
                // },
            }
        });
    </script> --}}
@endsection