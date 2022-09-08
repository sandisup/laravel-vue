@extends('layouts.admin')

@section('header', 'Supplier')

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" autocomplete="off" placeholder="search from title" v-model="search">
            </div>
        </div>
                <div>
                    <button class="btn btn-primary" @click="addData()">Create New Supplier</button>
                </div>

    </div>

    <hr>

    <div class="row">
        <div class="col-md-3 col-sm6 col-xs-12" v-for="supplier in filteredNama">
            <div class="info-box" v-on:click="editData(supplier)">
                <div class="info-box-content">
                    <span class="info-box-text h3">@{{ supplier.nama }}</span>
                    <span class="info-box-text ">@{{ supplier.alamat }}<small></small></span>
                    <span class="info-box-text ">@{{ supplier.telepon }}<small></small></span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" action="" autocomplete="off">
              <div class="modal-header">

                <h3 class="modal-title">Supplier</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="_method" value="POST" v-if="editStatus">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama"  required="" :value="supplier.nama">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat"  required="" :value="supplier.alamat">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon"  required="" :value="supplier.telepon">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" v-if="editStatus" v-on:click="deleteData(supplier.id)">Delete</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>@endsection

@section ('js')
<script type="text/javascript">
   var actionUrl = '{{ url('suppliers') }}';
   var apiUrl = '{{ url('api/suppliers') }}';

   var app = new Vue({
    el: '#controller',
    data: {
        suppliers: [],
        search: '',
        supplier:{},
        editStatus: false
    },
    mounted: function () {
        this.get_suppliers();
    },
    methods: {
        get_suppliers() {
            const _this = this;
            $.ajax({
                url: apiUrl,
                method: 'GET',
                success: function (data) {
                    _this.suppliers = JSON.parse(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        },
        addData() {
            this.supplier = {};
            this.actionUrl = '{{ url('suppliers') }}';
            this.editStatus = false;
            $('#modal-default').modal();
        },
        editData(supplier, id) {
            this.supplier = supplier;
            this.actionUrl = '{{ url('suppliers') }}'+'/'+supplier.id;
            this.editStatus = true;
            $('#modal-default').modal();
        },
        deleteData(id) {
                    this.actionUrl = '{{ url('suppliers') }}'+'/'+id;
                    if (confirm("Are you sure ?")) {
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response =>
                        {
                           location.reload();
                        });
                    }
        },
    },
    computed: {
        filteredNama() {
            return this.suppliers.filter(supplier => {
                return supplier.nama.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    }

   })
</script>
@endsection