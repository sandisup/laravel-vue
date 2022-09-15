@extends('layouts.admin')

@section('header', 'Home')

@section('content')
<div class="row">
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $total_kategoris }}</h3>
                <p>Total Kategori</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="{{ url('kategoris') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $total_members}}</h3>
                <p>Total Members</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('members') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $total_pembelians}}</h3>
                <p>Total Pembelian</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('pembelians') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $total_penjualans }}</h3>
                <p>Total Penjualan</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="{{ url('penjualans') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $total_produks}}</h3>
                <p>Total Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('produks') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $total_suppliers}}</h3>
                <p>Total Supplier</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('suppliers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                  <h3 class="card-title">Grafik Penjualan dan Pembelian</h3>
                    <div class="card-tools">
                        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>  
              </div>
              <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
              </div>
            </div>
          </div>

          

    </div>

</section>
@endsection

<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script type="text/javascript">

    var data_bar = '{!! json_encode($data_bar) !!}';

    $(function () {

        var areaChartData = {
            labels : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets : JSON.parse(data_bar)
        }
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
       // var temp0 = areaChartData.datasets[0]
       // var temp1 = areaChartData.datasets[1]
       // barChartData.datasets[0] = temp1
       // barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive          : true,
            maintainAspectRatio : false,
            datasetFill         : false,
        }

        new Chart(barChartCanvas,{
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    })
</script>
