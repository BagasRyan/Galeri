<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use File;

class GambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $album = DB::table('album')->where('id',$id)->first();

        $database = DB::table('gambar')->where('album_id',$id)->get();


        return view('gambar.index', compact('album', 'database'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id){
        return view('gambar.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        $id = $request->albumId;

        $album = DB::table('album')->where('id',$id)->value('nama');

        $gambar = $request->gambar;
        $namaGambar = $gambar->getClientOriginalName();
        $gambar->move('storage/', $namaGambar);

        DB::table('gambar')->insert([
            'album_id' => $id,
            'gambar' => $namaGambar
        ]);

         return redirect('/gambar/'.$id)->with('tambah', 'Gambar berhasil ditambahkan');
     
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
        $gambar = DB::table('gambar')->where('id',$id)->value('gambar');
        $albumId = DB::table('gambar')->where('id',$id)->value('album_id');
        $album = DB::table('album')->where('id',$albumId)->value('nama');

        File::delete('storage/'.$gambar);

        DB::table('gambar')->where('id',$id)->delete();

        return redirect('/gambar/'.$albumId)->with('hapus', 'Gambar Berhasil dihapus');

    }
}
