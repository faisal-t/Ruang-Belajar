

<?php $__env->startSection('header'); ?>
    Kelola Materi <?php echo e($materi->judul_modul); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_admin'); ?>



    <div class="row justify-content-end mr-3 mb-2">
    
           <div class="col-md-3">
                <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Materi Berbentuk Video
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Materi Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="<?php echo e(route('store.materi')); ?>" method="post" enctype="multipart/form-data" id="upload_form">
                        <div class="modal-body">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Judul Materi</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Modul" name="judul_materi" required>
                                
                              </div>

                              <div class="form-group">
                                <input type="file" class="form-control" name="link_materi" id="file">
                              </div>

                              <div class="form-group">
                                <progress class="form-control" id="progressBar" value="0" max="100" style="width:100%; display: none;"></progress>
                                <h3  id="status"></h3>
                                <p  id="loaded_n_total"></p>
                              </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Materi</button>
                        <input type="hidden" value="<?php echo e($materi->id); ?>" name="materi_id">
                        </div>
                    </form>
                </div>
                </div>
            </div>
           </div>

           
           
    
    </div>


<table id="table" class="table table-bordered">
<thead>
    <tr>
        <th>No.</th>
        <th>Judul Materi</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($d->judul_materi); ?></td>
            <td><?php echo e($d->kelas); ?></td>
            <td>

                <a href="<?php echo e(route('materi.submateri',$d->id)); ?>" class="btn btn-outline-primary">Lihat Detail Materi</a>

                <form class="d-inline-block" action="<?php echo e(route('materi.delete',$d->id)); ?>" method="post">
                
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('delete'); ?>
                  <button type="submit" class="btn btn-outline-danger">Hapus Materi</button>

                </form>
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



<script>
    function ambilId(file){
        return document.getElementById(file);
    }
 
    $(document).ready(function(){
        $("#upload").click(function(){
            ambilId("progressBar").style.display = "block";
            var file = ambilId("file").files[0];
 
            if (file!="") {
                var formdata = new FormData();
                formdata.append("file", file);
                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST","store/materi");
                ajax.send(formdata);
            }
        });
    });
 
    function progressHandler(event){
        ambilId("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
        var percent = (event.loaded / event.total) * 100;
        ambilId("progressBar").value = Math.round(percent);
        ambilId("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
    }
    function completeHandler(event){
        ambilId("status").innerHTML = event.target.responseText;
        ambilId("progressBar").value = 0;
    }
    function errorHandler(event){
        ambilId("status").innerHTML = "Upload Failed";
    }
    function abortHandler(event){
        ambilId("status").innerHTML = "Upload Aborted";
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project ahir\resources\views/materi/submateri.blade.php ENDPATH**/ ?>