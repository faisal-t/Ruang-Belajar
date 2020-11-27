

<?php $__env->startSection('header'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_admin'); ?>
<table id="table" class="table table-bordered">
<thead>
    <tr>
        <th>No.</th>
        <th>ID Member</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Aktivasi</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($d->id); ?></td>
            <td><?php echo e($d->name); ?></td>
            <td><?php echo e($d->email); ?></td>
            <td><?php echo e($d->jenis_kelamin); ?></td>
            <td><?php echo e($d->aktivasi); ?></td>
            <td>
                <?php if($d->aktivasi == null): ?>
                <form action="<?php echo e(route('admin.aktivasi', $d->id)); ?>" class="d-inline-block" method="POST"">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    
                    <button type="submit" class="btn btn-outline-primary">Aktivasi</button>
                </form> 
                <?php endif; ?>
                
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $("#table").DataTable();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project ahir\resources\views/kelola_user/index.blade.php ENDPATH**/ ?>