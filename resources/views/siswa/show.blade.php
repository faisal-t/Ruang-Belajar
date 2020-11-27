@extends('layouts.app')

@section('content')

    

    <div class="container">
        <h3>Daftar Materi</h3>
        <div class="list-group">

            {{-- <p>{{$data}}</p> --}}
            

            @foreach ($data as $item)
            <a href="{{route('siswa.materi.detail',$item->id)}}"  type="button" class="list-group-item list-group-item-action">{{$item->judul_materi}}</a>
            @endforeach
          </div>
    </div>
@endsection