<?php

namespace App\Http\Controllers;

use App\Models\DaftarKelas;
use App\Models\Materi;
use App\Models\Review;
use App\Models\SubMateri;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Materi::take(10)->get();
        return view('siswa.index',compact('data'));

    }

    public function listMateri(Materi $materi)
    {
        $data = SubMateri::where('materi_id',$materi->id)->get();
        
        return view('siswa.show',compact('data'));
    }

    public function showMateri(SubMateri $sub)
    {
        $data = SubMateri::where('id',$sub->id)->get();
        $datasiswa = DaftarKelas::where('user_id',auth()->user()->id)->get();
        return view('siswa.pelajaran',compact('data','datasiswa'));
    }

    public function sumbitReview(Request $request)
    {
        $data = $request->validate([
            'review_siswa' => 'required',
            'sub_materi_id' => 'required'
        ]);

        
        $data['user_id'] = auth()->user()->id;
        Review::create($data);

        return redirect()->route('siswa.index')->with('status','Review Materi Berhasil Dikirim');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
