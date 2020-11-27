

<?php $__env->startSection('content'); ?>

    

    <div class="container">
        <h3>Daftar Materi</h3>
        <div class="list-group">

            
            

            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('siswa.materi.detail',$item->id)); ?>"  type="button" class="list-group-item list-group-item-action"><?php echo e($item->judul_materi); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project ahir\resources\views/siswa/show.blade.php ENDPATH**/ ?>