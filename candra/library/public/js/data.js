var controller = new Vue({
    el: '#controller',
    data : {
        datas: [], //menyimpan semua data diauthor
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