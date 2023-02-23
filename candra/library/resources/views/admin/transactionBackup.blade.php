@extends('layouts.admin')
@section('header', 'Peminjaman')
@section('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<div id="controller">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-8">
                <a href="#" class="btn btn-success" @click="addData()">Tambah Transaksi</a>
              </div>
              <div class="col-md-2">
                <select class="form-control" name="status">
                  <option value="3" selected>Filter Status</option>
                  <option value="1">Belum Dikembalikan</option>
                  <option value="2">Sudah Dikembalikan</option>
                </select>
              </div>
              <div class="col-md-2">
                <input type="date" class="form-control">
              </div>
            </div>
          </div>

          <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Nama Peminjam</th>
                <th>kode</th>
                <th>Lama Pinjam (hari)</th>
                <th>Total Buku</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>id</th>
                <th>Action</th>
              </tr>
              </thead>
            </table>
          </div>

          {{-- modal tambah / edit --}}
          <div class="modal fade" id="modal-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="post" action="{{url('transactions')}}">
                  @csrf
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah / Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Anggota</label>
                      <div class="col-sm-9">
                        <select name="member_id" class="form-control">
                          @foreach ($members as $member)
                            <option selected=" data.member_id {{ $member->id }}" value="{{ $member->id }}"> 
                              {{ $member->name }} 
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="date_start">
                      </div>
                      <div class="col-sm-1">
                        <label> - </label>
                      </div>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="date_end">
                      </div>             
                    </div>
  
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Buku</label>
                      <div class="col-sm-9">
                        <select class="select2" multiple="multiple" name="multiple_book[]" data-placeholder="Select book's" style="width: 100%;">
                          @foreach ($books as $book)
                            @if($book->qty > 0)
                              <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
  
                    <div class="form-group row" v-if="editStatus">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="form-check col-sm-9">
                        <input id="radio-belum" class="form-check-input" type="radio" name="status" value="1">
                        <label for="radio-belum" class="form-check-label">Belum Dikembalikan</label>
                      </div>
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="form-check">
                        <input id="radio-sudah" class="form-check-input" type="radio" name="status" value="2">
                        <label for="radio-sudah" class="form-check-label">Sudah Dikembalikan</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- end modal tambah / edit --}}

          {{-- modal detail --}}

          <div class="modal fade" id="modal-detail">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Detail Peminjaman</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Anggota</label>
                    <div class="col-sm-9">
                      <label name="name" id="name"></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                      <label name="date_start" id="date_start"></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Buku</label>
                    <div class="col-sm-9">
                      <label name="buku" id="buku"></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <label name="status_name" id="status_name"></label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-right">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          {{-- end modal detail --}}

        </div>
      </div>
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
    <!-- Select2 -->
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <script type="text/javascript">
      var actionUrl = '{{ url('transactions') }}';
      var apiUrl = '{{ url('api/transactions') }}';
      var columns = [
        {data: 'date_start', class: 'text-center', orderable: false},
        {data: 'date_end', class: 'text-center', orderable: false},
        {data: 'name', class: 'text-center', orderable: false},
        {data: 'member_id', class: 'text-center', orderable: false},
        {data: 'lama_pinjam', class: 'text-center', orderable: false},
        {data: 'total_buku', class: 'text-center', orderable: false},
        {data: 'total_bayar', class: 'text-center', orderable: false},
        {data: 'status_name', class: 'text-center', orderable: false},
        {data: 'status', class: 'text-center', orderable: false},
        {render: function(index, row, data, meta)
          {
            return `
              <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" onclick="controller.editData(event, ${meta.row})">Edit</a>
              <a href="#" class="btn btn-primary btn-sm" onclick="controller.detailData(event, ${meta.row})">Detail</a>
              <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>
            `;
          }, orderable: false, width: '200px', class: 'text-center'
        },
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
        mounted: function(){
          this.datatable();
        },
        methods:{
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
            this.editStatus = false;
            $('#modal-tambah').modal();
          },
          editData(){
            this.editStatus = true;
            $('#modal-tambah').modal();
          },
          detailData(){
            $('#modal-detail').modal();
          },
        }
      });

      $('select[name=status').on('change', function(){
          status = $('select[name=status]').val();

          if(status == 3){
              controller.table.ajax.url(apiUrl).load();
          } else{
              controller.table.ajax.url(apiUrl+'?status='+status).load();
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