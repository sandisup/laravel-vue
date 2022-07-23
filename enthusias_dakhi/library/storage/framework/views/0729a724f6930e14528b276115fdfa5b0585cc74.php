
<?php $__env->startSection('header', 'Home'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo e($total_books); ?></h3>
                <p>Total Books</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="<?php echo e(url('books')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo e($total_members); ?></h3>
                <p>Total Members</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo e(url('members')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo e($total_publishers); ?></h3>
                <p>Data Publishers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo e(url('publishers')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo e($total_transactions); ?></h3>
                <p>Data Transaction</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo e(url('transactions')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <div class="col-lg-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Publisher Graphic</h3>
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
                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card card-success">
              <div class="card-header">
                  <h3 class="card-title">Transaction Graphic</h3>
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
<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/chart.js/Chart.min.js')); ?>"></script>
<script type="text/javascript">

    var label_donut = '<?php echo json_encode($label_donut); ?>';
    var data_donut = '<?php echo json_encode($data_donut); ?>';
    var data_bar = '<?php echo json_encode($data_bar); ?>';

    $(function () {
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: JSON.parse(label_donut),
            datasets: [
                {
                    data: JSON.parse(data_donut),
                    backgroundColor: ['#f56954','#00a65a','#f39c12','#00c0ef','#3c8dbc','#d2d5de','#f56954','#00a65a','#f39c12','#00c0ef','#3c8dbc','#d2d5de','#f56954','#00a65a','#f39c12','#00c0ef','#3c8dbc','#d2d5de','#3c8dbc','#d2d5de'],
                }
            ]
        }
        var donutOptions = {
            maintainAspectRatio : false,
            responsive : true,
        }

        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            option: donutOptions
        })

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-vue\enthusias_dakhi\library\resources\views/home.blade.php ENDPATH**/ ?>