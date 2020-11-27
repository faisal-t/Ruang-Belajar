

<?php $__env->startSection('header'); ?>
    Kelola Modul
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_admin'); ?>

<div class="row justify-content-end mr-auto mb-3">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary col-3" data-toggle="modal" data-target="#exampleModal">
    Tambah Modul
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Modul</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form action="<?php echo e(route('materi.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Judul Modul</label>
                    <input type="text" class="form-control" placeholder="Masukan Nama Modul" name="judul_modul" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                      <option value="12">Modul Untuk Kelas 12</option>
                      <option value="11">Modul Untuk Kelas 11</option>
                      <option value="10">Modul Untuk Kelas 10</option>
                    </select>
                    
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Materi</button>
                  </div>
            </form>
      </div>
    </div>
  </div>
</div>

<table id="table" class="table table-bordered">
<thead>
    <tr>
        <th>No.</th>
        <th>Judul Modul</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($d->judul_modul); ?></td>
            <td><?php echo e($d->kelas); ?></td>
            <td>

                <a href="<?php echo e(route('materi.siswa',$d->id)); ?>" class="btn btn-outline-primary">Lihat Siswa Yang Terdaftar</a>
                <a href="<?php echo e(route('materi.review',$d->id)); ?>" class="btn btn-outline-primary">Lihat Kesimpulan Para Siswa</a>

              
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

<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project ahir\resources\views/materi/kelas.blade.php ENDPATH**/ ?>