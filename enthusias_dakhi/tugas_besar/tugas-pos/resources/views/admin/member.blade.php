@extends('layouts.admin')

@section('header', 'Member')

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
                    <button class="btn btn-primary" @click="addData()">Create New Member</button>
                </div>

    </div>

    <hr>

    <div class="row">
        <div class="col-md-4" v-for="member in filteredNama">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user" v-on:click="editData(member)">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
              <span class="widget-user-text h3">@{{ member.nama }}</span>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-6 border-right">
                    <div class="description-block">
                      <span class="description-text">@{{ member.alamat }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 border-right">
                    <div class="description-block">
                      <span class="description-text">@{{ member.telepon }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" action="" autocomplete="off">
              <div class="modal-header">

                <h3 class="modal-title">Member</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="_method" value="POST" v-if="editStatus">

                    <div class="form-group">
                        <label>Kode Member</label>
                        <input type="number" class="form-control" name="kode_member"  required="" :value="member.kode_member">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama"  required="" :value="member.nama">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat"  required="" :value="member.alamat">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon"  required="" :value="member.telepon">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" v-if="editStatus" v-on:click="deleteData(member.id)">Delete</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section ('js')
<script type="text/javascript">
   var actionUrl = '{{ url('members') }}';
   var apiUrl = '{{ url('api/members') }}';

   var app = new Vue({
    el: '#controller',
    data: {
        members: [],
        search: '',
        member:{},
        editStatus: false
    },
    mounted: function () {
        this.get_members();
    },
    methods: {
        get_members() {
            const _this = this;
            $.ajax({
                url: apiUrl,
                method: 'GET',
                success: function (data) {
                    _this.members = JSON.parse(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        },
        addData() {
            this.member = {};
            this.actionUrl = '{{ url('members') }}';
            this.editStatus = false;
            $('#modal-default').modal();
        },
        editData(member, id) {
            this.member = member;
            this.actionUrl = '{{ url('members') }}'+'/'+member.id;
            this.editStatus = true;
            $('#modal-default').modal();
        },
        deleteData(id) {
                    this.actionUrl = '{{ url('members') }}'+'/'+id;
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
            return this.members.filter(member => {
                return member.nama.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    }

   })
</script>
@endsection