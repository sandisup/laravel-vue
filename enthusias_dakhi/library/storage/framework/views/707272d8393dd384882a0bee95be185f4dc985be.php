
<?php $__env->startSection('header', 'Catalog'); ?>

<?php $__env->startSection('content'); ?>

<div class="content">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
</div>
</div>
</div>
</section>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="<?php echo e(url('catalogs/create')); ?>" class="btn btn-sm btn-primary pull=right">Create New Catalog</a>
            </div>
        </div>
    </div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>N0</th>
<th class='text-center'>Name</th>
<th class='text-center'>Total books</th>
<th class='text-center'>Created at</th>
<th class='text-center'>Updated at</th>
<th class='text-center'>Action</th>

</tr>
</thead>
<tbody>
    <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($catalog->name); ?></td>
            <td class='text-center'><?php echo e(count( $catalog -> books)); ?></td>
            <td class='text-center'><?php echo e(convert_date($catalog->created_at)); ?></td>
            <td class='text-center'><?php echo e(convert_date($catalog->updated_at)); ?></td>
            <td class='text-center'>
                <a href="<?php echo e(url('catalogs/'.$catalog->id. '/edit')); ?>" class="btn btn-sm btn-warning">Edit</a>
            
            <form action="<?php echo e(url('catalogs', ['id' => $catalog->id])); ?>" method="post">
                <input class="btn btn-sm btn-danger" type="submit" value="Delete" onclick="return confirm('are you sure?')">
                <?php echo method_field('delete'); ?>
                <?php echo csrf_field(); ?>
            </form>

            </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>

</div>

</div>
</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-vue\enthusias_dakhi\library\resources\views/admin/catalog/index.blade.php ENDPATH**/ ?>