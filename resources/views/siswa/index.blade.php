@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @foreach ($data as $item)
        <div class="col-sm mt-2">
            <div class="card" style="height: 20rem">
                <div class="card-header bg-white">
                    <h4>{{$item->judul_modul}}</h4>
                </div>
                <div class="card-body">
                  
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <p class="card-text">Materi {{$item->user->name}} Untuk Kelas {{$item->kelas}}</p>
                  
                </div>

                <div class="card-footer bg-white">
                    <a href="{{route('siswa.materi',$item->id)}}" class="btn btn-primary w-100">Lihat Kelas</a>
                </div>

              </div>
        </div>
        @endforeach
        </div>
    </div>
@endsection