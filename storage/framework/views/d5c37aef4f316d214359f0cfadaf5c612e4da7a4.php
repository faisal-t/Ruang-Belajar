

<?php $__env->startSection('content'); ?>




<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?php echo e(asset("storage/" . $item->link_materi)); ?>" allowfullscreen></iframe>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="container mt-3">

    <div class="card">
        <div class="card-title m-3">
            <h3>Kesimpulan Dari Materi Diatas</h3>
        </div>
    </div>

    <form action="<?php echo e(route('submit.review')); ?>" method="post">
      <?php echo csrf_field(); ?>
      <textarea cols="80" id="editor1" name="review_siswa" rows="10" data-sample-short>
    
    
      </textarea>
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <input type="hidden" name="sub_materi_id" value="<?php echo e($item->id); ?>">
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
      <button type="submit" class="btn btn-primary w-100 mt-3">Submit Review</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    CKEDITOR.replace('editor1', {
      // Define the toolbar groups as it is a more accessible solution.
      toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },

        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
       
        {
          "name": "styles",
          "groups": ["styles"]
        },
       
      ],
      // Remove the redundant buttons from toolbar groups defined above.
    //   removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project ahir\resources\views/siswa/pelajaran.blade.php ENDPATH**/ ?>