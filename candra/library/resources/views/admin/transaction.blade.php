@extends('layouts.admin')
@section('header', 'Transaction')
@section('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-7">
                        <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Tambah Transaksi</a>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="status">
                            <option value="2">Filter Status</option>
                            <option value="0">Belum Dikembalikan</option>
                            <option value="1">Sudah Dikembalikan</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-control" name="date_start">
                            <option value="0">Filter Tanggal Pinjam</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr class="text-center">
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Nama Peminjam</th>
                    <th>Lama Pinjam (hari)</th>
                    <th>Total Buku</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
            </div>
            
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                <div class="modal-content">
                    {{-- submit form berfungsi membuat crud tanpa loading page --}}
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                        <h4 class="modal-title">Tambah / Edit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            {{-- v-if fungsinya jika editStatus = true, maka tampil --}}

                            <div class="form-group">
                                <label class="col-md-3">Anggota</label>
                                <select name="member_id" class="col-md-8">
                                    @foreach($members as $member)
                                    <option :selected = "data.member_id == {{ $member->id }}" :value="{{ $member->id }} ">
                                        {{ $member->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3">Tanggal</label>
                                <input type="date" class="col-md-4" name="date_start" :value="data.date_start" required="">
                                <input type="date" class="col-md-4" name="date_end" :value="data.date_end" required="">
                            </div>

                            <div class="form-group">
                                <label class="col-md-3">Book</label>
                                <select class="select2 col-md-8" name="multiple_book[]" multiple="multiple" data-placeholder="Masukkan Buku" required>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }} ">
                                            {{ $book->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" v-if="editStatus">
                                <div>
                                    <label class="col-md-3">Status</label>
                                    <input id="radio1" type="radio" name="status" :checked="data.status!=1">
                                    <label for="radio1">Belum Dikembalikan</label>
                                </div>
                                <div>
                                    <label class="col-md-3"></label>
                                    <input id="radio2" type="radio" name="status" :checked="data.status==1" >
                                    <label for="radio2">sudah Dikembalikan</label>
                                </div>
                                </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
                </div>
            </div>

            <div class="modal fade" id="modal-primary">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                        <h4 class="modal-title">Detail Peminjaman</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="col-md-3">Anggota</label>
                                <label class="col-md-1">:</label>
                                <label class="col-md-6" name="name" id="name"></label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3">Tanggal</label>
                                <label class="col-md-1">:</label>
                                <label class="col-md-6" name="date_start" id="date_start"></label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3">Buku</label>
                                <label class="col-md-1">:</label>
                                <label class="col-md-6" name="title" id="title"></label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3">Status</label>
                                <label class="col-md-1">:</label>
                                <label class="col-md-6" name="status_name" id="status_name"></label>
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
    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script type="text/javascript">
        var actionUrl = '{{ url('transactions') }}';
        // var apiUrl = '{{ url('api/transactions') }} ';
        var apiUrl = 'api/transactions';

        var columns = [
            // sesuaikan dengan api/author
            {data: 'date_start', class: 'text-center', orderable: true},
            {data: 'date_end', class: 'text-center', orderable: true},
            {data: 'name', class: 'text-center', orderable: true},
            {data: 'lama_pinjam', class: 'text-center', orderable: false},
            {data: 'member_id', class: 'text-center', orderable: false},
            {data: 'member_id', class: 'text-center', orderable: false},
            {data: 'status_name', class: 'text-center', orderable: false},
            {render: function (index, row, data, meta)
                {
                    return `
                        <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>
                        <a href="#" class="btn btn-primary btn-sm" onclick="controller.detailData(event, ${meta.row})")">Detail</a>
                        <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>
                    `;
                }, orderable: false, width: '200px', class: 'text-center'
            },
        ];

        var controller = new Vue({
            el: '#controller',
            data : {
                datas: [], //menyimpan semua data
                data: {},
                actionUrl,
                apiUrl,
                editStatus: false,
            },
            mounted: function(){
                this.datatable();  
            },
            methods: {
                datatable(){
                    const _this = this;
                    _this.table = $('#datatable').DataTable({
                        ajax:{
                            // url: _this.apiUrl,
                            url: apiUrl,
                            type: 'GET',
                        },
                        columns
                    }).on('xhr', function(){
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                addData(){  
                    // console.log('add Data');
                    this.data = {}; //fungsi {} agar nilainya kosong
                    // this.actionUrl = '{{ url('publishers') }}';

                    // untuk edit agar tidak terpakai di addData
                    this.editStatus = false;
                    
                    $('#modal-default').modal();    
                },
                detailData(event, row){
                    this.data = this.datas[row];

                    var str = this.data.name;
                    $('#name').html(str);

                    var str1 = this.data.date_start;
                    $('#date_start').html(str1);

                    var str3 = this.data.status_name;
                    $('#status_name').html(str3);

                    $('#modal-primary').modal();
                },
                editData(event, row){
                    // console.log(data);
                    this.data = this.datas[row]; //fungsi data agar nilainya terambil dari data di db
                    // this.actionUrl = '{{ url('publishers') }}'+'/'+this.data.id;

                    this.editStatus = true;

                    $('#modal-default').modal();
                },
                deleteData(event, id){
                    // console.log(id);
                    // this.actionUrl = '{{ url('publishers') }}'+'/'+id;
                    if(confirm("Are you sure ?")){
                        $(event.target).parents('tr').remove(); //menghapus tr ditable yang dihapus tanpa reload
                        axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response=>{
                        // axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response=>{
                            // location.reload();
                            alert('Data has been removed');
                        });
                    }
                },
                submitForm(event,id){
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response=> {
                        $('#modal-default').modal('hide');
                        _this.table.ajax.reload();
                    });
                },
            }
        });
    </script>
    <script type="text/javascript">
        $('select[name=status').on('change', function(){
            status = $('select[name=status]').val();

            if(status == 0){
                controller.table.ajax.url(actionUrl).load();
            } else{
                controller.table.ajax.url(actionUrl+'?status='+status).load();
            }
        });
        //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    })
    </script>
@endsection