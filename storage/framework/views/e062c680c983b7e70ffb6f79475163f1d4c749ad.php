

<?php $__env->startSection('header'); ?>
     Materi Tentang <?php echo e($judul_materi); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_admin'); ?>


            <div class="container">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?php echo e(asset("storage/" . $link_materi)); ?>" allowfullscreen></iframe>
                </div>
            </div>

        


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project ahir\resources\views/materi/show.blade.php ENDPATH**/ ?>