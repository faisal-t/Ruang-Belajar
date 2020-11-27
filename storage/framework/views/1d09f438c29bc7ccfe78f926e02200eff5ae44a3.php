

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm mt-2">
            <div class="card" style="height: 20rem">
                <div class="card-header bg-white">
                    <h4><?php echo e($item->judul_modul); ?></h4>
                </div>
                <div class="card-body">
                  
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <p class="card-text">Materi <?php echo e($item->user->name); ?> Untuk Kelas <?php echo e($item->kelas); ?></p>
                  
                </div>

                <div class="card-footer bg-white">
                    <a href="<?php echo e(route('siswa.materi',$item->id)); ?>" class="btn btn-primary w-100">Lihat Kelas</a>
                </div>

              </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project ahir\resources\views/siswa/index.blade.php ENDPATH**/ ?>