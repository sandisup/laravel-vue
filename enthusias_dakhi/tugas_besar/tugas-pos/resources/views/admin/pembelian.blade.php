@extends('layouts.admin')

@section('header', 'Pembelian')

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
                   <!-- <a href="{{ url('pembelians/create') }}" class="btn btn-sm btn-primary pull=right">Add New Pembelian</a> -->
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull=right">Add New Pembelian</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th width="30px">N0.</th>
                            <th class='text-center'>Nama Supplier</th>
                            <th class='text-center'>Total Item</th>
                            <th class='text-center'>Total Harga</th>
                            <th class='text-center'>Diskon</th>
                            <th class='text-center'>Bayar</th>
                            <th class='text-center'>Action</th>
                            </tr>
                        </thead>                       
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
              <div class="modal-header">

                <h3 class="modal-title">Pembelian</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                    <!--<div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" name="id_supplier" :value="data.id_supplier" required="">
                    </div>-->
                    <div class="form-group">
                        <label>Supplier</label>
                        <select name="id_supplier" class="form-control">
                            @foreach($suppliers as $supplier)
                            <option 
                            value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label>Produk</label>
                            <select class="select2 col-md-8" name="multiple_produk[]" multiple="multiple" data-placeholder="Masukkan Produk" required>
                                @foreach($produks as $produk)
                                        <option value="{{ $produk->id }} ">
                                            {{ $produk->nama_produk }}
                                        </option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Per Item</label>
                        <select class="select2 col-md-8" name="multiple_harga[]" multiple="multiple" data-placeholder="Masukkan Harga" required>
                            @foreach($produks as $produk)
                                    <option value="{{ $produk->id }} ">
                                        {{ $produk->harga_beli }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Total item</label>
                        <input type="number" class="form-control" name="total_item" :value="data.total_item" required="">
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" class="form-control" name="total_harga" :value="data.total_harga" required="">
                    </div>
                    <div class="form-group">
                        <label>Diskon</label>
                        <input type="text" class="form-control" name="diskon" :value="data.diskon" required="">
                    </div>
                    <div class="form-group">
                        <label>Bayar</label>
                        <input type="number" class="form-control" name="bayar" :value="data.bayar" required="">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript">
    var actionUrl = '{{ url('pembelians') }}';
    var apiUrl = '{{ url('api/pembelians') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'nama', class: 'text-center', orderable: true},
        {data: 'total_item', class: 'text-center', orderable: true},
        {data: 'total_harga', class: 'text-center', orderable: true},
        {data: 'diskon', class: 'text-center', orderable: true},
        {data: 'bayar', class: 'text-center', orderable: true},
        {render: function (index, row, data, meta) {
            return `
              <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
              Edit
              </a>
              <a href="{{ url('pembelians/${data.id}/detail') }}" class="btn btn-warning btn-sm">
              Detail
              </a>
              <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
              Delete
              </a>`;
        }, orderable: false, width: '200px', class: 'text-center'},
        ];

        var controller = new Vue({
            el: '#controller',
            data: {
                datas: [],
                data: {},
                actionUrl,
                apiUrl,
                editStatus: false,
            },
            mounted: function () {
                this.datatable();
            },
            methods: {
                datatable() {
                    const _this = this;
                    _this.table = $('#datatable').DataTable({
                        ajax: {
                            url: _this.apiUrl,
                            type: 'GET',
                        },
                        columns: columns
                    }).on('xhr', function () {
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                addData() {
                    this.data = {};
                    this.actionUrl = '{{ url('pembelians') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(event, row) {
                    this.data = this.datas[row];
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(event,id) {
                    if (confirm("Are you sure ?")) {
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response =>
                        {
                           alert('Data has been removed');
                        });
                    }
                },
                submitForm(event, id) {
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

        //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    })
    </script>
@endsection
