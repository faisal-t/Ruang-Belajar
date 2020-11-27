@extends('layouts.master')

@section('header')
     Materi Tentang {{$judul_materi}}
@endsection

@section('body_admin')


            <div class="container">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{asset("storage/" . $link_materi)}}" allowfullscreen></iframe>
                </div>
            </div>

        {{-- <video width="400" controls>
            <source src="{{asset("storage/" . $link_materi)}}" type="video/mp4">
            <source src="{{asset("storage/" . $link_materi)}}" type="video/ogg">
        Your browser does not support HTML5 video.
        </video> --}}


@endsection
