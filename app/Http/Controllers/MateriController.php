<?php

namespace App\Http\Controllers;

use App\Models\DaftarKelas;
use App\Models\Materi;
use App\Models\Review;
use App\Models\SubMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Materi::where('user_id',auth()->user()->id)->get();
        return view('materi.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul_modul' => 'required',
            'kelas' => 'required'
        ]);
        
        $data['user_id'] = auth()->user()->id;

        Materi::create($data);

        return back()->withStatus("Modul Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        $data = SubMateri::where('materi_id',$materi->id)->get();
        return view('materi.submateri',compact('data','materi'));
    }

    public function showKelas()
    {
        $data = Materi::where('user_id',auth()->user()->id)->get();
        return view('materi.kelas',compact('data'));
    }

    public function showSiswaKelas(Materi $materi)
    {
        $data = DaftarKelas::where('materi_id',$materi->id)->get();
        return view('materi.daftarkelas',compact('data'));
    }

    public function izinkanSiswa(DaftarKelas $id)
    {
        
        $id['status'] = "gabung kelas";
        $id->save();
        return back()->withStatus("Berhasil Mengizinkan Siswa Bergabung Dengan Kelas");

    }

    public function storeSubMateri(Request $request)
    {
        $data = $request->validate([
            'materi_id' => 'required',
            'judul_materi' => 'required',
            'link_materi' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);

        if($request->hasFile('link_materi')){
            $video_link = $request->file('link_materi');
            $video = $video_link->store('videos');
        }
        else{
            $video = null;
        }

        $data['link_materi'] =$video;
        SubMateri::create($data);

        return back()->withStatus("Materi Berhasil Ditambahkan");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $data = $request->validate([
            'judul_modul' => 'required',
            'kelas' => 'required'
        ]);

        $materi->fill($data);
        $materi->save();

        return back()->withStatus("Materi Berhasil Diupdate");


    }

    public function showMateri(SubMateri $id)
    {
        return view('materi.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        $materi->details()->delete();
        $materi->delete();
        return back()->withStatus("Modul Berhasil Dihapus");
        
    }

    public function delete(SubMateri $id)
    {
        \Storage::delete($id->link_materi);  
        $id->delete();
        return back()->withStatus("Materi Berhasil Dihapus");
    }

    public function showReview(SubMateri $id)
    {
        $data = Review::where('sub_materi_id',$id->id)->get();
        return view('materi.review',compact('data'));
    }
}
