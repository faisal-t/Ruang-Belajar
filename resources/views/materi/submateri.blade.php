@extends('layouts.master')

@section('header')
    Kelola Materi {{$materi->judul_modul}}
@endsection

@section('body_admin')



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
                    <form action="{{route('store.materi')}}" method="post" enctype="multipart/form-data" id="upload_form">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label>Judul Materi</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Modul" name="judul_materi" required>
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
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
                        <input type="hidden" value="{{$materi->id}}" name="materi_id">
                        </div>
                    </form>
                </div>
                </div>
            </div>
           </div>

           {{-- Bagian Untuk Materi Berbasis Teks --}}
           {{-- <div class="col-md-3">
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Tambah Materi Berbentuk Teks
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Materi Teks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                ..
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
       </div> --}}
    
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
    @foreach ($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->judul_materi }}</td>
            <td>{{ $d->kelas }}</td>
            <td>

                <a href="{{route('materi.submateri',$d->id)}}" class="btn btn-outline-primary">Lihat Detail Materi</a>

                <form class="d-inline-block" action="{{route('materi.delete',$d->id)}}" method="post">
                
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-outline-danger">Hapus Materi</button>

                </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>

{{-- <div id="editor">This is some sample content.</div> --}}
@endsection

@section('js')
<script type="text/javascript">
    $("#table").DataTable();
</script>

<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

{{-- <script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script> --}}

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
@endsection