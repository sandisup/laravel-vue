@extends('layouts.admin')
@section('header', 'Transaction')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

@role('petugas')
<component id="controller">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ url('transactions/create') }}" class="btn btn-sm btn-primary pull=right">Add New Transaction</a>
                </div>
                <div class="col-md-2">
                <select class="form-control" name="">
                    <option value="">Status</option>
                    <option value="">Dikembalikan</option>
                    <option value="">Pengembalian terlambat</option>
                </select>
                </div>
                <div class="col-md-2">
                <select class="form-control" name="">
                    <option value="">Waktu peminjaman</option>
                    <option value="">Juni</option>
                    <option value="">Juli</option>
                </select>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th width="30px">N0.</th>
                    <th class='text-center'>Date Start</th>
                    <th class='text-center'>Date End</th>
                    <th class='text-center'>Member Name</th>
                    <th class='text-center'>Lama Pinjam(hari)</th>
                    <th class='text-center'>Total Buku</th>
                    <th class='text-center'>Total Bayar</th>
                    <th class='text-center'>Status</th>
                    <th class='text-center'>Action</th>
                    </tr>
                </thead>                       
            </table>
        </div>
    </div>
</component>
@endrole
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
    var actionUrl = '{{ url('transactions') }}';
    var apiUrl = '{{ url('api/transactions') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: false},
        {data: 'date_start', class: 'text-center', orderable: false},
        {data: 'date_end', class: 'text-center', orderable: false},
        {data: 'member_id', class: 'text-center', orderable: false},
        {data: 'status', class: 'text-center', orderable: false},
        {data: 'status', class: 'text-center', orderable: false},
        {data: 'status', class: 'text-center', orderable: false},
        {data: 'status', class: 'text-center', orderable: false},
        {render: function (index, row, data, meta) {
            return `
              <a href="{{ url('transactions/${data.id}/edit') }}" class="btn btn-warning btn-sm">
              Edit
              </a>
              <a href="{{ url('transactions/${data.id}/detail') }}" class="btn btn-warning btn-sm">
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
                    this.actionUrl = '{{ url('transactions') }}';
                    this.editStatus = false;
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('transactions') }}'+'/'+data.id;
                    this.editStatus = true;
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
            }

        });
</script>
@endsection